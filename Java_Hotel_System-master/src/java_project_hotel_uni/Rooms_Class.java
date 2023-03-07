
package java_project_hotel_uni;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JComboBox;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;


public class Rooms_Class {
    
    my_SQL_Connect_Class mycon1 = new my_SQL_Connect_Class();
    
    public void addingTypeOfRoomsIntoTable(JTable myGuestTable) 
    {                        
        String slctQry_1 = "SELECT * FROM `roomtype`";
        try {
            PreparedStatement PrepaSt_1 = mycon1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            DefaultTableModel DftTM1 = (DefaultTableModel)myGuestTable.getModel();
            Object[] line;
            while(ResSet_1.next() )
            {
                line = new Object[3]; 
                line[0] = ResSet_1.getInt(1);
                line[1] = ResSet_1.getString(2);
                line[2] = ResSet_1.getString(3);
                   
                
                DftTM1.addRow(line);
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    
    public void addingRoomsIntoTable(JTable myGuestTable) 
    {                        
        String slctQry_1 = "SELECT * FROM `rooms`";
        try {
            PreparedStatement PrepaSt_1 = mycon1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            DefaultTableModel DftTM1 = (DefaultTableModel)myGuestTable.getModel();
            Object[] line;
            while(ResSet_1.next() )
            {
                line = new Object[4]; 
                line[0] = ResSet_1.getInt(1);
                line[1] = ResSet_1.getInt(2);
                line[2] = ResSet_1.getString(3);
                line[3] = ResSet_1.getString(4);
                   
                
                DftTM1.addRow(line);
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void adding_RESERVED_OR_FREE_RoomsIntoTable(JTable myGuestTable, String freeORreserved) 
    {                        
        
        // - - - - - - - - - - - - 
        // Изтриване на информацията в таблицата :
        DefaultTableModel model = (DefaultTableModel) myGuestTable.getModel();
        model.setRowCount(0);
        // - - - - - - - - - - - - 
        
        String slctQry_1 = String.format("SELECT * FROM `rooms` WHERE `Rreserved`='%s'", freeORreserved);
                
        try {
            PreparedStatement PrepaSt_1 = mycon1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            DefaultTableModel DftTM1 = (DefaultTableModel)myGuestTable.getModel();
            Object[] line;
            while(ResSet_1.next() )
            {
                line = new Object[4]; 
                line[0] = ResSet_1.getInt(1);
                line[1] = ResSet_1.getInt(2);
                line[2] = ResSet_1.getString(3);
                line[3] = ResSet_1.getString(4);
                   
                
                DftTM1.addRow(line);
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
        
    public void addingTypeOfRoomsIntoComboBox(JComboBox myComboBox) 
    {                        
        String slctQry_1 = "SELECT * FROM `roomtype`";
        try {
            PreparedStatement PrepaSt_1 = mycon1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            
            while(ResSet_1.next() )
            {
                myComboBox.addItem(ResSet_1.getInt(1));
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public boolean AddingRooms(int number, int room_Type, String GSM)
    {
        String qry = "INSERT INTO `rooms`(`Rnumber`, `Rtype`, `RGSM`, `Rreserved`) VALUES (?,?,?,?)";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry);
            
            PpdSt_1.setInt(1, number);
            PpdSt_1.setInt(2, room_Type);
            PpdSt_1.setString(3, GSM);
                         
            PpdSt_1.setString(4, "Not Free");
             
            return (PpdSt_1.executeUpdate()>0);            
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }                
    }
    
    
    public boolean editingSelectedRoom(int number, int room_Type, String GSM, String isFree) 
    {

        String qry_editingSelectedGuest = "UPDATE `rooms` SET `Rtype`=?,`RGSM`=?,`Rreserved`=? WHERE `Rnumber`=?";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry_editingSelectedGuest);
            
            PpdSt_1.setInt(1, room_Type);            
            PpdSt_1.setString(2, GSM);
            PpdSt_1.setString(3, isFree);
            PpdSt_1.setInt(4, number);
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }
    
    

    public boolean delRoom(int rNumber) 
    {        
        String qryDELETE = "DELETE FROM `rooms` WHERE `Rnumber`=?";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qryDELETE);
                        
            PpdSt_1.setInt(1, rNumber);
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }


    public boolean setingRoomToReserved(int number, String isFree) 
    {

        String qry_editingSelectedGuest = "UPDATE `rooms` SET `Rreserved`=? WHERE `Rnumber`=?";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry_editingSelectedGuest);
            
            
            PpdSt_1.setString(1, isFree);
            PpdSt_1.setInt(2, number);
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }
        
    
    public String isRoomToReserved(int number) 
    {

        ResultSet RstSt_1 = null;
        String qry_editingSelectedGuest = "SELECT `Rreserved` FROM `rooms` WHERE `Rnumber` = ?";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry_editingSelectedGuest);
            
            
            PpdSt_1.setInt(1, number);
            RstSt_1 = PpdSt_1.executeQuery();
            
            if(RstSt_1.next())
            {
                return RstSt_1.getString(1);
            }else
            {
                return "";
            }
            
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return "";
        }  
    }
    
}