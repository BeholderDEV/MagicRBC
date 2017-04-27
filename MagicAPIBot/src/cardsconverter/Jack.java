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
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Alisson
 */
public class Jack {
    ObjectMapper mapper = new ObjectMapper();
    
    
    public void run(){
        mapper.configure(DeserializationFeature.FAIL_ON_IGNORED_PROPERTIES, false);
        try {
//            Card card = mapper.readValue(new File("C:\\xampp\\htdocs\\magic\\onecard.json"), Card.class);
//            System.out.println(card.getName());
            CardCollection cl = mapper.readValue(new File("C:\\xampp\\htdocs\\magic\\sat2.json"), CardCollection.class);
            
            for(int i=0; i<cl.getCards().length;i++){
                if(cl.getCards()[i].getSet().equals("DDS") || cl.getCards()[i].getSet().equals("AKH") || cl.getCards()[i].getSet().equals("MPS_AKH")){
                    System.out.println(i+" - "+cl.getCards()[i].getSetName()+" - "+cl.getCards()[i].getName());
                }
            }
            
        } catch (IOException ex) {
            Logger.getLogger(Jack.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
