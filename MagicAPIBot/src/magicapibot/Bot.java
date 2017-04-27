/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package magicapibot;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.DataOutputStream;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JFileChooser;


/**
 *
 * @author 5674867
 */
public class Bot {
    private File jsonFile;
    
    
    public void downloadAPI(){
        //https://api.magicthegathering.io/v1/cards?page=5&pageSize=50
        
        this.salvarTexto("");
        URL magic;
        try {
            for (int i = 327; i < 333; i++) {
                magic = new URL("https://api.magicthegathering.io/v1/cards" + "?page=" + i);
                URLConnection mc = magic.openConnection();
                mc.addRequestProperty("User-Agent", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)");
                BufferedReader in = new BufferedReader(
                                        new InputStreamReader(
                                        mc.getInputStream()));
                String inputLine;

                while ((inputLine = in.readLine()) != null){
                    if(i != 1){
                        inputLine = inputLine.substring(10, inputLine.length());
                    }
                    if(i != 332){
                        inputLine = inputLine.substring(0, inputLine.length() - 2) + ", ";
                    }
                    System.out.println("Page: " + i);
                    try {
                        PrintWriter out = new PrintWriter(new BufferedWriter(new FileWriter(jsonFile, true)));
                        out.println(inputLine);
                        out.close();
                    } catch (Exception ex) {
                        ex.printStackTrace();
                    }
                }
                in.close();
            }

        } catch (MalformedURLException ex) {
            Logger.getLogger(Bot.class.getName()).log(Level.SEVERE, null, ex);
        } catch (IOException ex) {
            Logger.getLogger(Bot.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void salvarTexto(String Stringtxt){
            JFileChooser chooser = new JFileChooser();
            int returnVal = chooser.showSaveDialog(null);
            if (returnVal == JFileChooser.APPROVE_OPTION) {
                this.jsonFile = chooser.getSelectedFile();
            }
    }
    
}
