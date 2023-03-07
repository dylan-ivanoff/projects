
package java_project_hotel_uni;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;


public class GuestClass {
    my_SQL_Connect_Class mycon1 = new my_SQL_Connect_Class();
    
    public int checkIfThereIsAnAnotherGSMNumberLikeThisOne(String phone)
    {
        String slctQry_1 = String.format("SELECT * FROM `guesttable` WHERE `gsm`='%s'",phone);
        try {
            PreparedStatement PrepaSt_1 = mycon1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
                        
            if(ResSet_1.next() )
            {
                return 1;
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
        return 0;
    }
    
    
    public boolean AddingGuests(String FN, String LN, String GSM, String Email)
    {        
        String qry = "INSERT INTO `guestTable`(`first_name`, `last_name`, `gsm`, `email`, `guest_rating`) VALUES (?,?,?,?,?)"; 
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry);
            
            PpdSt_1.setString(1, FN);
            PpdSt_1.setString(2, LN);
            PpdSt_1.setString(3, GSM);
            PpdSt_1.setString(4, Email);
            PpdSt_1.setString(5, "0");
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }                
    }
    
        
    public boolean editingSelectedGuest(int id, String FN, String LN, String GSM, String Email, String Rating)
    {

        String qry_editingSelectedGuest = "UPDATE `guesttable` SET `first_name`=?,`last_name`=?,`gsm`=?,`email`=?,`guest_rating`=? WHERE `gID`=?";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry_editingSelectedGuest);
            
            PpdSt_1.setString(1, FN);
            PpdSt_1.setString(2, LN);
            PpdSt_1.setString(3, GSM);
            PpdSt_1.setString(4, Email);
            PpdSt_1.setString(5, Rating);
            PpdSt_1.setInt(6, id);
            
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }
    
    public boolean delGuest(int idOfGuest)
    {

        String qryDELETE = "DELETE FROM `guesttable` WHERE `gID`=?";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qryDELETE);
                        
            PpdSt_1.setInt(1, idOfGuest);
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }
    
    
    public void addingItemsIntoTable(JTable myGuestTable)
    {                        
        String slctQry_1 = "SELECT * FROM `guestTable`";
        try {
            PreparedStatement PrepaSt_1 = mycon1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            DefaultTableModel DftTM1 = (DefaultTableModel)myGuestTable.getModel();
            Object[] line;
            while(ResSet_1.next() )
            {
                line = new Object[6]; 
                line[0] = ResSet_1.getInt(1);
                line[1] = ResSet_1.getString(2);
                line[2] = ResSet_1.getString(3);
                line[3] = ResSet_1.getString(4);
                line[4] = ResSet_1.getString(5);    
                line[5] = ResSet_1.getString(6);
                
                DftTM1.addRow(line);
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void guest_Rating_reservation(int gID, int reservation_index)
    {
        guest_Rating_extra_services(gID, reservation_index);
    }
    
    public void guest_Rating_extra_services(int gID, int extra_services_index)
    {
        int guestRating = get_guest_rating_from_DB(gID); 
        
        guestRating = guestRating + extra_services_index;
        
        add_guest_Rating_in_DB(gID, guestRating);
    }
    
    public int get_guest_rating_from_DB(int gID)
    {
        String slctQry_1 = String.format("SELECT `guest_rating` FROM `guesttable` WHERE `gID`='%d'",gID);
        try {
            PreparedStatement PrepaSt_1 = mycon1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
                        
            if(ResSet_1.next() )
            {
                return Integer.valueOf(ResSet_1.getString(1));
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
        return 0;
    }
    
    public boolean add_guest_Rating_in_DB(int gID, int rating)
    {
        String qry_editingSelectedGuest = "UPDATE `guesttable` SET `guest_rating`=? WHERE `gID`=?";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry_editingSelectedGuest);
            
            
            PpdSt_1.setString(1, String.valueOf(rating));
            PpdSt_1.setInt(2, gID);
                        
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }
    
}
