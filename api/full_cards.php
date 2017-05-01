<?php
// Connecting, selecting database
$dbconn = pg_connect("host=ec2-23-21-220-188.compute-1.amazonaws.com port=5432 dbname=dctik1bjnhg0cq user=eqmabwrwaxuqaw password=a957bffb046d116cdfba8ca15b59011110ad6009865f822b7b1116032799ef79 sslmode=require")
              or die('Could not connect: ' . pg_last_error());


$query = "select
          card.id,
          card.name,
          card.manacost,
          card.cmc,
          card.imageurl,
          card.c_power,
          card.c_toughness,
          card.description,
          string_agg(distinct rarity.name, ', ') as rarity,
          string_agg(distinct cardset.name, ', ') as cardset,
          string_agg(distinct color.name, ', ') as colors,
          string_agg(distinct supertype.name, ', ') as supertypes,
          string_agg(distinct public.type.name, ', ') as tipos
          from card
          full join card_color on (card_color.id_card = card.id)
          full join color on (card_color.id_color = color.id)
          full join card_supertype on (card_supertype.id_card = card.id)
          full join supertype on (card_supertype.id_supertype = supertype.id)
          full join card_type on (card_type.id_card = card.id)
          full join public.type on (card_type.id_type = public.type.id)
          full join cardset on (cardset.id = card.set_id)
          full join rarity on (rarity.id = card.rarity_id)
          group by card.id;";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$resultArray = pg_fetch_all($result);

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$required_card = array("Colors" => $obj['colors'], "Type" => $obj['type'], "SuperType" => $obj['supertype'], "Rarity" => $obj['rarity'], "ConvertedManaCost" => $obj['cmc']);

$pesos = array("Colors" => 0.25, "Type" => 0.25, "SuperType" => 0.1, "Rarity" => 0.2, "ConvertedManaCost" => 0.2);

$rarity = array
(
  "Common"      =>  array( "Common" => 1.0, "Uncommon" => 0.8, "Rare" => 0.6, "Mythic Rare" => 0.4, "Rare"=>	0.2, "Basic Land" =>	0.8),
  "Uncommon"    =>  array( "Common" => 0.8, "Uncommon" => 1.0, "Rare" => 0.8, "Mythic Rare" => 0.6, "Rare"=>	0.4, "Basic Land" =>	0.6),
  "Rare"        =>  array( "Common" => 0.6, "Uncommon" => 0.8, "Rare" => 1.0, "Mythic Rare" => 0.8, "Rare"=>	0.6, "Basic Land" =>	0.4),
  "Mythic Rare" =>  array( "Common" => 0.4, "Uncommon" => 0.6, "Rare" => 0.8, "Mythic Rare" => 1.0, "Rare"=>	0.8, "Basic Land" =>	0.2),
  "Special"     =>  array( "Common" => 0.2, "Uncommon" => 0.4, "Rare" => 0.6, "Mythic Rare" => 0.8, "Rare"=>  1.0, "Basic Land" =>	0.1),
  "Basic Land"  =>  array( "Common" => 0.8, "Uncommon" => 0.6, "Rare" => 0.4, "Mythic Rare" => 0.2, "Rare"=>	0.8, "Basic Land" =>	1.0)
);

$type = array
(
  "Land"          =>  array( "Land" => 1.0, "Creature" => 0.2, "Artifact" => 0.2, "Enchantment" => 0.2, "Planeswalker"=>	0.2, "Instant" =>	0.2, "Sorcery" =>	0.2),
  "Creature"      =>  array( "Land" => 0.2, "Creature" => 1.0, "Artifact" => 0.3, "Enchantment" => 0.5, "Planeswalker"=>	0.6, "Instant" =>	0.2, "Sorcery" =>	0.2),
  "Artifact"      =>  array( "Land" => 0.2, "Creature" => 0.3, "Artifact" => 1.0, "Enchantment" => 0.5, "Planeswalker"=>	0.2, "Instant" =>	0.2, "Sorcery" =>	0.2),
  "Enchantment"   =>  array( "Land" => 0.2, "Creature" => 0.5, "Artifact" => 0.5, "Enchantment" => 1.0, "Planeswalker"=>	0.2, "Instant" =>	0.5, "Sorcery" =>	0.5),
  "Planeswalker"  =>  array( "Land" => 0.2, "Creature" => 0.6, "Artifact" => 0.2, "Enchantment" => 0.2, "Planeswalker"=>	1.0, "Instant" =>	0.2, "Sorcery" =>	0.2),
  "Instant"       =>  array( "Land" => 0.2, "Creature" => 0.2, "Artifact" => 0.2, "Enchantment" => 0.5, "Planeswalker"=>	0.2, "Instant" =>	1.0, "Sorcery" =>	0.8),
  "Sorcery"       =>  array( "Land" => 0.2, "Creature" => 0.2, "Artifact" => 0.2, "Enchantment" => 0.5, "Planeswalker"=>	0.2, "Instant" =>	0.8, "Sorcery" =>	1.0)
);

$color = array
(
  "Blue"      =>  array( "Blue" => 1.0, "Red" => 0.2, "Green" => 0.5, "Black" => 0.6, "White"=>	0.5, "Colorless" =>	0.8),
  "Red"       =>  array( "Blue" => 0.2, "Red" => 1.0, "Green" => 0.3, "Black" => 0.6, "White"=>	0.3, "Colorless" =>	0.8),
  "Green"     =>  array( "Blue" => 0.5, "Red" => 0.3, "Green" => 1.0, "Black" => 0.5, "White"=>	0.6, "Colorless" =>	0.8),
  "Black"     =>  array( "Blue" => 0.6, "Red" => 0.6, "Green" => 0.5, "Black" => 1.0, "White"=>	0.2, "Colorless" =>	0.8),
  "White"     =>  array( "Blue" => 0.5, "Red" => 0.3, "Green" => 0.6, "Black" => 0.2, "White"=>	1.0, "Colorless" =>	0.8),
  "Colorless" =>  array( "Blue" => 0.8, "Red" => 0.8, "Green" => 0.8, "Black" => 0.8, "White"=>	0.8, "Colorless" =>	1.0)
);

$supertype = array
(
  "Basic"     =>  array( "Basic" => 1.0, "Legendary" => 0.0, "Ongoing" => 0.0, "Snow" => 0.5, "World"=>	0.0, "Untyped" =>	0.2),
  "Legendary" =>  array( "Basic" => 0.0, "Legendary" => 1.0, "Ongoing" => 0.0, "Snow" => 0.5, "World"=>	0.0, "Untyped" =>	0.7),
  "Ongoing"   =>  array( "Basic" => 0.0, "Legendary" => 0.0, "Ongoing" => 1.0, "Snow" => 0.0, "World"=>	0.0, "Untyped" =>	0.2),
  "Snow"      =>  array( "Basic" => 0.5, "Legendary" => 0.5, "Ongoing" => 0.0, "Snow" => 1.0, "World"=>	0.0, "Untyped" =>	0.6),
  "World"     =>  array( "Basic" => 0.0, "Legendary" => 0.0, "Ongoing" => 0.0, "Snow" => 0.0, "World"=>	1.0, "Untyped" =>	0.0),
  "Untyped"   =>  array( "Basic" => 0.2, "Legendary" => 0.7, "Ongoing" => 0.2, "Snow" => 0.6, "World"=>	0.0, "Untyped" =>	1.0)
);

$cmc = array
(
  "0"  =>  array( "0" => 1.0, "1" => 0.0, "2" => 0.0, "3" => 0.0, "4"=>	0.0, "5" =>	0.0, "6" =>	0.0, "7" =>	0.0, "8" =>	0.0, "9" =>	0.0, "10" =>	0.0),
  "1"  =>  array( "0" => 0.0, "1" => 1.0, "2" => 0.9, "3" => 0.8, "4"=>	0.7, "5" =>	0.6, "6" =>	0.5, "7" =>	0.4, "8" =>	0.3, "9" =>	0.2, "10" =>	0.1),
  "2"  =>  array( "0" => 0.0, "1" => 0.9, "2" => 1.0, "3" => 0.9, "4"=>	0.8, "5" =>	0.7, "6" =>	0.6, "7" =>	0.5, "8" =>	0.4, "9" =>	0.3, "10" =>	0.2),
  "3"  =>  array( "0" => 0.0, "1" => 0.8, "2" => 0.9, "3" => 1.0, "4"=>	0.9, "5" =>	0.8, "6" =>	0.7, "7" =>	0.6, "8" =>	0.5, "9" =>	0.4, "10" =>	0.3),
  "4"  =>  array( "0" => 0.0, "1" => 0.7, "2" => 0.8, "3" => 0.9, "4"=>	1.0, "5" =>	0.9, "6" =>	0.8, "7" =>	0.7, "8" =>	0.6, "9" =>	0.5, "10" =>	0.4),
  "5"  =>  array( "0" => 0.0, "1" => 0.6, "2" => 0.7, "3" => 0.8, "4"=>	0.9, "5" =>	1.0, "6" =>	0.9, "7" =>	0.8, "8" =>	0.7, "9" =>	0.6, "10" =>	0.5),
  "6"  =>  array( "0" => 0.0, "1" => 0.5, "2" => 0.6, "3" => 0.7, "4"=>	0.8, "5" =>	0.9, "6" =>	1.0, "7" =>	0.9, "8" =>	0.8, "9" =>	0.7, "10" =>	0.6),
  "7"  =>  array( "0" => 0.0, "1" => 0.4, "2" => 0.5, "3" => 0.6, "4"=>	0.7, "5" =>	0.8, "6" =>	0.9, "7" =>	1.0, "8" =>	0.9, "9" =>	0.8, "10" =>	0.7),
  "8"  =>  array( "0" => 0.0, "1" => 0.3, "2" => 0.4, "3" => 0.5, "4"=>	0.6, "5" =>	0.7, "6" =>	0.8, "7" =>	0.9, "8" =>	1.0, "9" =>	0.9, "10" =>	0.8),
  "9"  =>  array( "0" => 0.0, "1" => 0.2, "2" => 0.3, "3" => 0.4, "4"=>	0.5, "5" =>	0.6, "6" =>	0.7, "7" =>	0.8, "8" =>	0.9, "9" =>	1.0, "10" =>	0.9),
  "10" =>  array( "0" => 0.0, "1" => 0.1, "2" => 0.2, "3" => 0.3, "4"=>	0.4, "5" =>	0.5, "6" =>	0.6, "7" =>	0.7, "8" =>	0.8, "9" =>	0.9, "10" =>	1.0)
);
unset($resultArray[count($resultArray)-1]);

foreach($resultArray as &$row) {
    $cor = trata_string($row["colors"]);
    $tipo = trata_string($row["tipos"]);
    $superTipo = trata_string($row["supertypes"]);
    $raridade = $row["rarity"];
    $custoConvertido = trata_custo($row["cmc"]);

    $pontuacao_cor = $color[$required_card["Colors"]][$cor];
    $pontuacao_tipo = $type[$required_card["Type"]][$tipo];
    $pontuacao_sTipo = $supertype[$required_card["SuperType"]][$superTipo];
    $pontuacao_raridade = $rarity[$required_card["Rarity"]][$raridade];
    $pontuacao_cmc = $cmc[$required_card["ConvertedManaCost"]][$custoConvertido];

    $proximidade = $pontuacao_cor*$pesos["Colors"];
    $proximidade += $pontuacao_tipo*$pesos["Type"];
    $proximidade += $pontuacao_sTipo*$pesos["SuperType"];
    $proximidade += $pontuacao_raridade*$pesos["Rarity"];
    $proximidade += $pontuacao_cmc*$pesos["ConvertedManaCost"];

    $row["proximidade"]= $proximidade*100;
}

foreach ($resultArray as $key => $row) {
    // replace 0 with the field's index/key
    $dates[$key]  = $row["proximidade"];
}

array_multisort($dates, SORT_DESC, $resultArray);

// usort($resultArray, function($a, $b) {
//     return $a["proximidade"] - $b["proximidade"];
// });

// print_r ($resultArray);
echo json_encode($resultArray);


function trata_custo($custo)
{
  if($custo>10)
  {
    return 10;
  }
  return $custo;
}

function trata_string($string)
{
  if($string==null)
  {
    return "Untyped";
  }
  $array = explode(", ", $string);
  return $array[0];
}
?>
