select
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
          group by card.id;


select  card.name,
        card.manacost,
        card.cmc,
        card.imageurl,
        card.c_power,
        card.c_toughness,
        card.description,
        string_agg(distinct rarity.name, ', ') as rarity,
        string_agg(distinct cardset.name, ', ') as cardset,
        array_to_json(array_agg(distinct color.name)) as colors,
        array_to_json(array_agg(distinct supertype.name)) as supertypes,
        array_to_json(array_agg(distinct public.type.name)) as tipos
        from card
        full join card_color on (card_color.id_card = card.id)
        full join color on (card_color.id_color = color.id)
        full join card_supertype on (card_supertype.id_card = card.id)
        full join supertype on (card_supertype.id_supertype = supertype.id)
        full join card_type on (card_type.id_card = card.id)
        full join public.type on (card_type.id_type = public.type.id)
        full join cardset on (cardset.id = card.set_id)
        full join rarity on (rarity.id = card.rarity_id)
        group by card.id;
