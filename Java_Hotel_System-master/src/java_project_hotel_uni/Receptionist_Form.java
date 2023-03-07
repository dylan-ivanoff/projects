
package java_project_hotel_uni;

import java.awt.Color;
import java.awt.Component;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JFrame;
import javax.swing.JTable;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.DefaultTableModel;

public class Receptionist_Form extends javax.swing.JFrame {

    public Receptionist_Form() {
        initComponents();
        
        adding_ENDING_ReservationsIntoTable(jTable1);
        
// - - - - - - - - - -- - - - - -  
        // всеки 1ви ред във таблицата да е син и всеки 2ри да е сив :
        jTable1.setDefaultRenderer(Object.class, new DefaultTableCellRenderer()
        {
          @Override
           public Component getTableCellRendererComponent(JTable table, Object value, boolean isSelected, boolean hasFocus, int row, int column)
           {
              final Component c = super.getTableCellRendererComponent(table, value, isSelected, hasFocus, row, column);
              c.setBackground(row % 2 == 0 ? Color.BLUE : Color.LIGHT_GRAY);
              return c;
           }
        });
        
// - - - - - - - - - - - -- - -         
    }
    
    my_SQL_Connect_Class mysqlconn_reservation_obj1 = new my_SQL_Connect_Class();
    
    String username_of_recept; 
    public String setThings(String recept_username) 
    {
        username_of_recept = recept_username;
        return username_of_recept;
    }
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jMenuBar1 = new javax.swing.JMenuBar();
        jMenu1 = new javax.swing.JMenu();
        jMenu2 = new javax.swing.JMenu();
        jPanel1 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        jMenuBar2 = new javax.swing.JMenuBar();
        jMenu3 = new javax.swing.JMenu();
        menuItem_Rooms = new javax.swing.JMenuItem();
        menuItem_Guests = new javax.swing.JMenuItem();
        menuItem_Reservations = new javax.swing.JMenuItem();

        jMenu1.setText("File");
        jMenuBar1.add(jMenu1);

        jMenu2.setText("Edit");
        jMenuBar1.add(jMenu2);

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(0, 51, 255));

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Reservation ID", "Guest ID", "Room Number", "Date_Came", "Date_went"
            }
        )

    );
    jTable1.addMouseListener(new java.awt.event.MouseAdapter() {
        public void mouseClicked(java.awt.event.MouseEvent evt) {
            jTable1MouseClicked(evt);
        }
    });
    jScrollPane1.setViewportView(jTable1);

    javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
    jPanel1.setLayout(jPanel1Layout);
    jPanel1Layout.setHorizontalGroup(
        jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(jPanel1Layout.createSequentialGroup()
            .addContainerGap()
            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 646, javax.swing.GroupLayout.PREFERRED_SIZE)
            .addContainerGap(42, Short.MAX_VALUE))
    );
    jPanel1Layout.setVerticalGroup(
        jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
            .addContainerGap(67, Short.MAX_VALUE)
            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 259, javax.swing.GroupLayout.PREFERRED_SIZE)
            .addGap(64, 64, 64))
    );

    jMenu3.setText("What do You want to do?");

    menuItem_Rooms.setText("Rooms");
    menuItem_Rooms.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            menuItem_RoomsActionPerformed(evt);
        }
    });
    jMenu3.add(menuItem_Rooms);

    menuItem_Guests.setText("Guests");
    menuItem_Guests.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            menuItem_GuestsActionPerformed(evt);
        }
    });
    jMenu3.add(menuItem_Guests);

    menuItem_Reservations.setText("Reservations");
    menuItem_Reservations.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            menuItem_ReservationsActionPerformed(evt);
        }
    });
    jMenu3.add(menuItem_Reservations);

    jMenuBar2.add(jMenu3);

    setJMenuBar(jMenuBar2);

    javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
    getContentPane().setLayout(layout);
    layout.setHorizontalGroup(
        layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(layout.createSequentialGroup()
            .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
            .addGap(0, 0, Short.MAX_VALUE))
    );
    layout.setVerticalGroup(
        layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(layout.createSequentialGroup()
            .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
            .addGap(0, 0, Short.MAX_VALUE))
    );

    pack();
    }// </editor-fold>//GEN-END:initComponents

    private void menuItem_RoomsActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_menuItem_RoomsActionPerformed
        roomsForm rF1 = new roomsForm();
        rF1.setVisible(true);
        rF1.pack();
        rF1.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
    }//GEN-LAST:event_menuItem_RoomsActionPerformed

    private void menuItem_GuestsActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_menuItem_GuestsActionPerformed
        guestsForm gF1 = new guestsForm();
        gF1.setVisible(true);
        gF1.pack();
        gF1.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE); 
    }//GEN-LAST:event_menuItem_GuestsActionPerformed

    private void menuItem_ReservationsActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_menuItem_ReservationsActionPerformed
        reservationsForm resF1 = new reservationsForm();
        resF1.setVisible(true);
             resF1.setThings(username_of_recept);
        resF1.pack();
        resF1.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
    }//GEN-LAST:event_menuItem_ReservationsActionPerformed

    private void jTable1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jTable1MouseClicked

    }//GEN-LAST:event_jTable1MouseClicked

    // метод за извеждане в таблицата клиентите 4иито резервации изтиат в текущия ден
    private void adding_ENDING_ReservationsIntoTable(JTable myGuestTable) 
    {                        
        
        String todays_Date = java.time.LocalDate.now().toString(); //Формат : yyyy-MM-dd
        
        // - - - - - - - - - - - - 
        // Изтриване на информацията в таблицата :
        DefaultTableModel model = (DefaultTableModel) myGuestTable.getModel();
        model.setRowCount(0);
        // - - - - - - - - - - - - 
        
        String slctQry_1 = String.format("SELECT * FROM `reservations` WHERE `date_went`='%s' AND `cancelled_reservation_reason`='%s'",todays_Date,""); 
        /* по този начин НЕ се визуализират отменените резервации (при 
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
    
    
    public static void main(String args[]) {
        
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Receptionist_Form().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JMenu jMenu1;
    private javax.swing.JMenu jMenu2;
    private javax.swing.JMenu jMenu3;
    private javax.swing.JMenuBar jMenuBar1;
    private javax.swing.JMenuBar jMenuBar2;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jTable1;
    private javax.swing.JMenuItem menuItem_Guests;
    private javax.swing.JMenuItem menuItem_Reservations;
    private javax.swing.JMenuItem menuItem_Rooms;
    // End of variables declaration//GEN-END:variables
}
