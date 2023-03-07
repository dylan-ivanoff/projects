/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package java_project_hotel_uni;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.logging.Level;
import java.util.logging.Logger;
import static javax.swing.JOptionPane.ERROR_MESSAGE;
import static javax.swing.JOptionPane.showMessageDialog;
import javax.swing.table.DefaultTableModel;

import javax.swing.JTable;

public class info_reservations_DB_Form extends javax.swing.JFrame {

    Reservation_Class reserv_class_obj1 = new Reservation_Class();
    my_SQL_Connect_Class mysqlconn_obj1 = new my_SQL_Connect_Class();
    Rooms_Class room = new Rooms_Class();
        
    public info_reservations_DB_Form() {
        initComponents();
        
        addingReservationsIntoTable(jTable1);
    }
    
    // - - - - - - - - - 
    my_SQL_Connect_Class mysqlconn_reservation_obj1 = new my_SQL_Connect_Class();
    
    public void addingReservationsIntoTable(JTable myGuestTable) 
    {                        
        String slctQry_1 = "SELECT * FROM `reservations`";
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

    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        jLabel1 = new javax.swing.JLabel();
        search_by_date_btn1 = new javax.swing.JButton();
        dateChooser_Date_Came = new com.toedter.calendar.JDateChooser();
        dateChooser_Date_Went = new com.toedter.calendar.JDateChooser();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(204, 255, 204));

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Reservation ID", "Guest ID", "Room Number", "Date_Came", "Date_went", "Recept. That Made it"
            }
        )

    );
    jTable1.addMouseListener(new java.awt.event.MouseAdapter() {
        public void mouseClicked(java.awt.event.MouseEvent evt) {
            jTable1MouseClicked(evt);
        }
    });
    jScrollPane1.setViewportView(jTable1);

    jLabel1.setFont(new java.awt.Font("Tahoma", 0, 24)); // NOI18N
    jLabel1.setText("RESERVATION INFO");

    search_by_date_btn1.setText("Search By Date of Registration");
    search_by_date_btn1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            search_by_date_btn1ActionPerformed(evt);
        }
    });

    javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
    jPanel1.setLayout(jPanel1Layout);
    jPanel1Layout.setHorizontalGroup(
        jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(jPanel1Layout.createSequentialGroup()
            .addContainerGap()
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 672, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addComponent(jLabel1)
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addComponent(search_by_date_btn1, javax.swing.GroupLayout.PREFERRED_SIZE, 200, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGroup(jPanel1Layout.createSequentialGroup()
                            .addComponent(dateChooser_Date_Came, javax.swing.GroupLayout.PREFERRED_SIZE, 122, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGap(61, 61, 61)
                            .addComponent(dateChooser_Date_Went, javax.swing.GroupLayout.PREFERRED_SIZE, 122, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGap(0, 0, Short.MAX_VALUE)))
            .addContainerGap())
    );
    jPanel1Layout.setVerticalGroup(
        jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(jPanel1Layout.createSequentialGroup()
            .addContainerGap()
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addComponent(jLabel1)
                .addComponent(dateChooser_Date_Came, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addComponent(dateChooser_Date_Went, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 7, Short.MAX_VALUE)
            .addComponent(search_by_date_btn1)
            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 208, javax.swing.GroupLayout.PREFERRED_SIZE)
            .addContainerGap())
    );

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
        .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
    );

    pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jTable1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jTable1MouseClicked

        DefaultTableModel DfTblMl_1 = (DefaultTableModel)jTable1.getModel();

        int selectedLine = jTable1.getSelectedRow();
               
    }//GEN-LAST:event_jTable1MouseClicked

    private void search_by_date_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_search_by_date_btn1ActionPerformed
        
        try{
        // -- -- -- -- -- 
        SimpleDateFormat Date_Format = new SimpleDateFormat("yyyy-MM-dd");
        java.util.Date dateCame_var = dateChooser_Date_Came.getDate();
        java.util.Date dateWent_var = dateChooser_Date_Went.getDate();
        
        String dateCame = Date_Format.format(dateCame_var);
        String Date_Went = Date_Format.format(dateWent_var);
        
        String slctQry_1 = String.format("SELECT * FROM `reservations` WHERE `date_came`>='%s' AND `date_came`<='%s'",dateCame, Date_Went );
                  
        try {            
            PreparedStatement PrepaSt_1 = mysqlconn_obj1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            jTable1.setModel(new DefaultTableModel(null, new Object[]{"Reservation ID", "Guest ID", "Room Number", "Date_Came", "Date_went", "Recept. That Made it"})); 
            DefaultTableModel DftTM1 = (DefaultTableModel)jTable1.getModel();           
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
        
        }catch(NumberFormatException e)
        {
            showMessageDialog(null, e.getMessage(), "ERROR", ERROR_MESSAGE);
        }
        
       
    }//GEN-LAST:event_search_by_date_btn1ActionPerformed

    
    
    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(info_reservations_DB_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(info_reservations_DB_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(info_reservations_DB_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(info_reservations_DB_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new info_reservations_DB_Form().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private com.toedter.calendar.JDateChooser dateChooser_Date_Came;
    private com.toedter.calendar.JDateChooser dateChooser_Date_Went;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jTable1;
    private javax.swing.JButton search_by_date_btn1;
    // End of variables declaration//GEN-END:variables
}
