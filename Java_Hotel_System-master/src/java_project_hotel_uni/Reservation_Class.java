/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package java_project_hotel_uni;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import static javax.swing.JOptionPane.INFORMATION_MESSAGE;
import static javax.swing.JOptionPane.showMessageDialog;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

public class Reservation_Class {
    
    my_SQL_Connect_Class mysqlconn_reservation_obj1 = new my_SQL_Connect_Class();
    Rooms_Class room = new Rooms_Class();
    
    public boolean AddingReservation(int guestID, int roomNum, String dateCame, String dateWent, String receptName)
    {         
        String qry = "INSERT INTO `reservations`(`guestID`, `rNumber`, `date_came`, `date_went`, `recept_that_made_reserv`, `cancelled_reservation_reason`) VALUES (?,?,?,?,?,?)";
        
        try {
            PreparedStatement PpdSt_1 = mysqlconn_reservation_obj1.devConnect().prepareStatement(qry);
            
            PpdSt_1.setInt(1, guestID);
            PpdSt_1.setInt(2, roomNum);
            PpdSt_1.setString(3, dateCame);
            PpdSt_1.setString(4, dateWent);
            PpdSt_1.setString(5, receptName);
            PpdSt_1.setString(6, "");
        //    PpdSt_1.setString(5, Cancel_Reserv);
            
            if(room.isRoomToReserved(roomNum).equals("Not Free"))
            {
                     if(PpdSt_1.executeUpdate()>0)
                 {
                        room.setingRoomToReserved(roomNum, "Yes");
                        return true;                         
                 }else
                    {
                         return false;
                    }
            }else
            {
                showMessageDialog(null, "The Rooms is Taken ", "Room reserved", INFORMATION_MESSAGE);
                return false;
            }                                              
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }                
    }
    
    public boolean editingSelectedReservation(int reserID, int guestID, int roomNum, String dateCame, String dateWent, String cancellation_Type) 
    {

        String qry_editingSelectedGuest = "UPDATE `reservations` SET `guestID`=?,`rNumber`=?,`date_came`=?,`date_went`=?,`cancelled_reservation_reason`=? WHERE `id`=?";
        
        try {
            PreparedStatement PpdSt_1 = mysqlconn_reservation_obj1.devConnect().prepareStatement(qry_editingSelectedGuest);
                        
            PpdSt_1.setInt(1, guestID);
            PpdSt_1.setInt(2, roomNum);
            PpdSt_1.setString(3, dateCame);
            PpdSt_1.setString(4, dateWent);
            PpdSt_1.setString(5, cancellation_Type); 
            PpdSt_1.setInt(6, reserID); 
            
            
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }
    
    public boolean delReservation(int reserID) 
    {

        String qryDELETE = "DELETE FROM `reservations` WHERE `id`=?";
        
        try {
            PreparedStatement PpdSt_1 = mysqlconn_reservation_obj1.devConnect().prepareStatement(qryDELETE);
                        
            PpdSt_1.setInt(1, reserID);
            
            int room_number = getRoomNumberFromReservation(reserID);
            
            if(PpdSt_1.executeUpdate()>0)
            {
                room.setingRoomToReserved(room_number, "No");
                return true;   
            }else
            {
                return false;
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }
    
    public void addingReservationsIntoTable(JTable myGuestTable) 
    {                        
        String slctQry_1 = "SELECT `id`,`guestID`,`rNumber`,`date_came`,`date_went`,`cancelled_reservation_reason` FROM `reservations`";
        try {
            PreparedStatement PrepaSt_1 = mysqlconn_reservation_obj1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            DefaultTableModel DftTM1 = (DefaultTableModel)myGuestTable.getModel();
            Object[] line;
            while(ResSet_1.next() )
            {
                line = new Object[6]; 
                line[0] = ResSet_1.getInt(1);
                line[1] = ResSet_1.getInt(2);
                line[2] = ResSet_1.getInt(3);
                line[3] = ResSet_1.getString(4);
                line[4] = ResSet_1.getString(5);
                line[5] = ResSet_1.getString(6);
                   
                
                DftTM1.addRow(line);
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void adding_RECENT_ReservationsIntoTable(JTable myGuestTable) 
    {                        

        String todays_Date = java.time.LocalDate.now().toString(); //Формат : yyyy-MM-dd
        
        // - - - - - - - - - - - - 
        // Изтриване на информацията в таблицата :
        DefaultTableModel model = (DefaultTableModel) myGuestTable.getModel();
        model.setRowCount(0);
        // - - - - - - - - - - - - 
        
        String slctQry_1 = String.format("SELECT * FROM `reservations` WHERE `date_went`>='%s' AND `cancelled_reservation_reason`='%s'",todays_Date,""); 
        /* по този начин НЕ се визуализират отменените резервации при натискане на бутон recentReservations (при 
        всички без отменените резервации полето cancelled_reservation_reason в DB е празен стринг)*/
        
        
        try {
            PreparedStatement PrepaSt_1 = mysqlconn_reservation_obj1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            DefaultTableModel DftTM1 = (DefaultTableModel)myGuestTable.getModel();
            Object[] line;
            while(ResSet_1.next() )
            {
                line = new Object[5]; 
                line[0] = ResSet_1.getInt(1);
                line[1] = ResSet_1.getInt(2);
                line[2] = ResSet_1.getInt(3);
                line[3] = ResSet_1.getString(4);
                line[4] = ResSet_1.getString(5);
                   
                
                DftTM1.addRow(line);
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    

    public int getRoomNumberFromReservation(int reservationID)
    {
        String slctQry_1 = "SELECT `rNumber` FROM `reservations` WHERE `id` = ?";
        try {
            PreparedStatement PrepaSt_1 = mysqlconn_reservation_obj1.devConnect().prepareStatement(slctQry_1);
            
            PrepaSt_1.setInt(1, reservationID);
            
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();            
            
            if(ResSet_1.next())
            {
                return ResSet_1.getInt(1);
            }else
            {
                return 0;
            }
            
            } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return 0;
        }
    }
    
}
