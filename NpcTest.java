

import static org.junit.Assert.*;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;

/**
 * @author Group 7 : ATHOMAS Julie, DANEL Maxime, GENDRE Karine, 
 * LAPEYRE Clara, LEONARDON Thomas, MARCHEIX Benjamin, PONSOT Ambroise
 * 
 * @version (12 Novermber 2019)
 */
public class NpcTest
{
    private NpcTest npcT;

    /**
     * Test all the different getters.
     */
    @Test
    public void NpcTest()
    {
        Npc npc = new Npc("Npc", "Pomme", "", "aaa");//Create an object with constante parameters
        assertEquals("Npc", npc.getName());
        assertEquals(false, npc.getState());
        assertEquals("", npc.getText());
    }
    
    /**
     * Test the mechanism of the drop and take item.
     */
    @Test
    public void itemTest()
    {
        Npc npc = new Npc("Npc", null, "", "aaa");//Create an NPC 
        Player player = new Player(null);
        
        assertEquals(null, npc.loseItem(null));
        assertEquals(false, npc.addItem(null));
        
        Item item = new Item("item", "random item", 10);//Create an item         
       
        assertEquals(true, npc.addItem(item));
        assertEquals(item, npc.loseItem(item));
    }
    
    /**
     * Test the activation of the condition of the NPC.
     */
    @Test
    public void conditionTest()
    {
        Npc npc = new Npc("Npc", null, "", "aaa");//Create an NPC 
        assertEquals(false, npc.getState());
        npc.activate();
        assertEquals(true, npc.getState());
    }
}
