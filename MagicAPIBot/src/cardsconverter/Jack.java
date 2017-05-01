/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cardsconverter;

import com.fasterxml.jackson.databind.DeserializationFeature;
import com.fasterxml.jackson.databind.ObjectMapper;
import java.io.File;
import java.io.IOException;
import java.util.Arrays;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Alisson
 */
public class Jack {
    
    private static final List<String> SETS = Arrays.asList("BFZ" , "OGW" , "SOI" , "EMN" , "KLD" , "AER" , "AKH");
    ObjectMapper mapper = new ObjectMapper();
    
    private int getRarityID(String raridade){
        switch (raridade){
            case "Common":
               return 1;
            case "Uncommon":
               return 2;   
            case "Rare":
               return 3;
            case "Mythic Rare":
               return 4;
            case "Special":
               return 5;
            case "Basic Land":
               return 6;
            default:
               return 1;
        }
    }
    
    private int getSetID(String set){
        switch (set){
            case "BFZ":
               return 1;
            case "OGW":
               return 2;   
            case "SOI":
               return 3;
            case "EMN":
               return 4;
            case "KLD":
               return 5;
            case "AER":
               return 6;
            case "AKH":
               return 7;
            default:
               return 1;
        }
    }
    
    private String resolve(String s){
        if(s!=null){
            return s.replace("'", "§");
        }
        else{
            return s;
        }
            
    }
    
    private int colorToId(String c){
        switch (c){
            case "C":
               return 1;
            case "W":
               return 2;   
            case "B":
               return 3;
            case "R":
               return 4;
            case "G":
               return 5;
            case "U":
               return 6;
            default:
               return 1;
        }
    }
    
    private int typeToId(String c){
        switch (c){
            case "Creature":
               return 1;
            case "Land":
               return 2;   
            case "Artifact":
               return 3;
            case "Enchantment":
               return 4;
            case "Planeswalker":
               return 5;
            case "Sorcery":
               return 6;
            case "Instant":
               return 7;
            default:
               return 1;
        }
    }
    
    private int stypeToId(String c){
        switch (c){
            case "Untyped":
               return 1;
            case "Basic":
               return 2;   
            case "Legendary":
               return 3;
            case "Ongoing":
               return 4;
            case "Snow":
               return 5;
            case "World":
               return 6;
            default:
               return 1;
        }
    }
    private String resolveImageUrl(String s){
        return s.replace("http://", "//");
    }
    
    private String resplveInt(String s){
        if(s == null){
            s = "none";
        }
        return s;
    }
    
    public void run(){
        mapper.configure(DeserializationFeature.FAIL_ON_IGNORED_PROPERTIES, false);
        try {
            
            CardCollection cl = mapper.readValue(new File("/var/www/html/MagicRBC/zendikartest2.json"), CardCollection.class);
            
            for(int i=0; i<cl.getCards().length;i++){
                if(SETS.contains(cl.getCards()[i].getSet())){
                    System.out.println("insert into card(id, name, manaCost, cmc, rarity_id, set_id, imageUrl, c_power, c_toughness, description) values ('"+
                                                    i+"','"+
                                                    resolve(cl.getCards()[i].getName())+"','"+
                                                    cl.getCards()[i].getManaCost()+"','"+
                                                    Math.min(cl.getCards()[i].getCmc(),10)+"','"+
                                                    getRarityID(cl.getCards()[i].getRarity())+"','"+
                                                    getSetID(cl.getCards()[i].getSet())+"','"+
                                                    resolveImageUrl(cl.getCards()[i].getImageUrl())+"','"+
                                                    resplveInt(cl.getCards()[i].getPower())+"','"+
                                                    resplveInt(cl.getCards()[i].getToughness())+"','"+
                                                    resolve(cl.getCards()[i].getText())+"');");
                    if(cl.getCards()[i].getColorIdentity() != null){
                        String[] colors = cl.getCards()[i].getColorIdentity();
                        for (String color : colors) {
                            System.out.println("insert into card_color (id_card, id_color) values ("+(i)+","+colorToId(color)+");");
                        }
                    }else{
                        System.out.println("insert into card_color (id_card, id_color) values ("+(i)+","+colorToId("C")+");");
                    }
                
                    if(cl.getCards()[i].getTypes() != null){
                        String[] types = cl.getCards()[i].getTypes();
                        for (String color : types) {
                            System.out.println("insert into card_type (id_card, id_type) values ("+(i)+","+typeToId(color)+");");
                        }
                    }
                    if(cl.getCards()[i].getSupertypes() != null){
                        String[] stypes = cl.getCards()[i].getSupertypes();
                        for (String color : stypes) {
                            System.out.println("insert into card_supertype (id_card, id_supertype) values ("+(i)+","+stypeToId(color)+");");
                        }
                    }
                }
            }
            
        } catch (IOException ex) {
            Logger.getLogger(Jack.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
