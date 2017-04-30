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
    
    public void run(){
        mapper.configure(DeserializationFeature.FAIL_ON_IGNORED_PROPERTIES, false);
        try {
            
            CardCollection cl = mapper.readValue(new File("/var/www/html/MagicRBC/zendikartest2.json"), CardCollection.class);
            
            for(int i=0; i<cl.getCards().length;i++){
                if(SETS.contains(cl.getCards()[i].getSet())){
                    if(cl.getCards()[i].getPower()!= null){
                        System.out.println("insert into card(name, manaCost, cmc, rarity_id, set_id, imageUrl, c_power, c_toughness, description) values ('"+
                                                        resolve(cl.getCards()[i].getName())+"','"+
                                                        cl.getCards()[i].getManaCost()+"','"+
                                                        Math.max(cl.getCards()[i].getCmc(),10)+"','"+
                                                        getRarityID(cl.getCards()[i].getRarity())+"','"+
                                                        getSetID(cl.getCards()[i].getSet())+"','"+
                                                        cl.getCards()[i].getImageUrl()+"','"+
                                                        cl.getCards()[i].getPower()+"','"+
                                                        cl.getCards()[i].getToughness()+"','"+
                                                        resolve(cl.getCards()[i].getText())+"');");
                    }else{
                        System.out.println("insert into card(name, manaCost, cmc, rarity_id, set_id, imageUrl, c_power, c_toughness, description) values ('"+
                                                        resolve(cl.getCards()[i].getName())+"','"+
                                                        cl.getCards()[i].getManaCost()+"','"+
                                                        Math.max(cl.getCards()[i].getCmc(),10)+"','"+
                                                        getRarityID(cl.getCards()[i].getRarity())+"','"+
                                                        getSetID(cl.getCards()[i].getSet())+"','"+
                                                        cl.getCards()[i].getImageUrl()+"','"+
                                                        -1+"','"+
                                                        -1+"','"+
                                                        resolve(cl.getCards()[i].getText())+"');");
                    }
                    
                }
            }
            
        } catch (IOException ex) {
            Logger.getLogger(Jack.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
