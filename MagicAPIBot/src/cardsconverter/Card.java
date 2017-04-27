/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cardsconverter;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

/**
 *
 * @author Alisson
 */
@JsonIgnoreProperties(value={"loyalty","watermark","names", "foreignNames","number","variations","rulings","reserved","type" , "subtypes", "flavor","artist","layout","multiverseid","printings","originalText","originalType","legalities","id"})
public class Card {
    private String name;
    private String manaCost;
    private int cmc;
    private String[] colors;
    private String[] colorIdentity;
    private String[] supertypes;
    private String[] types;
    private String rarity;
    private String set;
    private String setName;
    private String imageUrl;
    private String power;
    private String toughness;
    private String text;

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getManaCost() {
        return manaCost;
    }

    public void setManaCost(String manaCost) {
        this.manaCost = manaCost;
    }

    public int getCmc() {
        return cmc;
    }

    public void setCmc(int cmc) {
        this.cmc = cmc;
    }

    public String[] getColors() {
        return colors;
    }

    public void setColors(String[] colors) {
        this.colors = colors;
    }

    public String[] getColorIdentity() {
        return colorIdentity;
    }

    public void setColorIdentity(String[] colorIdentity) {
        this.colorIdentity = colorIdentity;
    }

    public String[] getSupertypes() {
        return supertypes;
    }

    public void setSupertypes(String[] supertypes) {
        this.supertypes = supertypes;
    }

    public String[] getTypes() {
        return types;
    }

    public void setTypes(String[] types) {
        this.types = types;
    }

    public String getRarity() {
        return rarity;
    }

    public void setRarity(String rarity) {
        this.rarity = rarity;
    }

    public String getSet() {
        return set;
    }

    public void setSet(String set) {
        this.set = set;
    }

    public String getSetName() {
        return setName;
    }

    public void setSetName(String setName) {
        this.setName = setName;
    }

    public String getImageUrl() {
        return imageUrl;
    }

    public void setImageUrl(String imageUrl) {
        this.imageUrl = imageUrl;
    }

    public String getPower() {
        return power;
    }

    public void setPower(String power) {
        this.power = power;
    }

    public String getToughness() {
        return toughness;
    }

    public void setToughness(String toughness) {
        this.toughness = toughness;
    }

    public String getText() {
        return text;
    }

    public void setText(String text) {
        this.text = text;
    }
    
    
}
