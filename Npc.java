import java.util.HashMap;
import java.util.Set;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.ListIterator;

/**
 * This is the NPC. This is none playable character which we can interact. 
 * The NPC can give or take items from players and display different messages.
 *
 * @author Group 7 : ATHOMAS Julie, DANEL Maxime, GENDRE Karine, 
 * LAPEYRE Clara, LEONARDON Thomas, MARCHEIX Benjamin, PONSOT Ambroise
 * 
 * @version (12 November 2019)
 */
public class Npc extends InteractElmnt
{
    // variables d'instance 
    private String requiredItem; //Check if the player has the item required by the NPC.
    private String texti, textf; //Different line dialogue
    private List<Item> listItem = new ArrayList<Item>(); //Create a list of item carry by the NPC
    
    /**
     * Constructeur d'objets de classe Npc
     */
    public Npc(String name, String requiredItem, String texti, String textf)
    {
        // initialisation des variables d'instance
        super(name);
        this.requiredItem=requiredItem;
        this.texti=texti;
        this.textf=textf;
    }
    
    /**
     * Allow the NPC to drop an item
     * if the NPC has an item to drop
     * 
     * @param  Item
     * @return  boolean   a boolean which is true if the action was realized.
     * 
     */
    public boolean loseItem(Item item)
    {
        if (listItem.contains(item)){
            listItem.remove(item);
            return true;
        }
        return false;
    }
    
    /**
     * Allow the NPC to take an item
     * 
     * @param  Item
     * @return  boolean   a boolean which is true if the action was realized.
     */
    public boolean addItem(Item item)
    {
        listItem.add(item);
        return true;
    }
    
    /**
     * Display the text following the boolean
     * 
     * @return  String   the text of the NPC.
     */
    public String getText()
    {
        if (getState()==false){
            return texti;
        }
        else{
            return textf;
        }
    }    
    
    /**
     * This method returns the item list of the player.
     * @return  List : tems of the player
     */
    public List<Item> getListItem()
    {
        return (listItem);
    }
    
    /**
     * returns the required item
     * 
     * @return  String   the required item
     */
    public String getRequiredItem()
    {
        return(requiredItem);
    } 
}



