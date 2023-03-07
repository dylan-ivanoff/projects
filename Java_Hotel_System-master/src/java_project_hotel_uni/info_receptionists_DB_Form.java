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
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

public class info_receptionists_DB_Form extends javax.swing.JFrame {

    GuestClass gcObj1 = new GuestClass();
    my_SQL_Connect_Class mycon1 = new my_SQL_Connect_Class();
    
    public info_receptionists_DB_Form() {
        initComponents();
    }
    
    //  - - - - - - - - - - - - - 
    
    String HName;
    public void setHotelName(String hotelName)
    {
        HName = hotelName;
    }
    
    public void activate_addingItemsIntoTable()
    {
        addingItemsIntoTable(jTable1);
    }
    
    //  - - - - - - - - - - - - - 
    
    public void addingItemsIntoTable(JTable myGuestTable)
    {                        
         String slctQry_1 = String.format("SELECT * FROM `users` WHERE `receptionist_hotel_name`='%s'", HName);
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

    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        search_by_receptionist_uName_textBox1 = new javax.swing.JTextField();
        search_by_receptionist_userName_btn1 = new javax.swing.JToggleButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(0, 153, 204));

        jLabel1.setFont(new java.awt.Font("Lucida Bright", 0, 24)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(255, 255, 255));
        jLabel1.setText("RECEPTIONISTS INFO");

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Recept. ID", "Username", "Password", "First Name", "Last Name", "Hotel?"
            }
        )

    );
    jTable1.addMouseListener(new java.awt.event.MouseAdapter() {
        public void mouseClicked(java.awt.event.MouseEvent evt) {
            jTable1MouseClicked(evt);
        }
    });
    jScrollPane1.setViewportView(jTable1);

    search_by_receptionist_userName_btn1.setText("Seach by Username");
    search_by_receptionist_userName_btn1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            search_by_receptionist_userName_btn1ActionPerformed(evt);
        }
    });

    javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
    jPanel1.setLayout(jPanel1Layout);
    jPanel1Layout.setHorizontalGroup(
        jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(jPanel1Layout.createSequentialGroup()
            .addContainerGap()
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addComponent(jLabel1)
                    .addGap(18, 18, 18)
                    .addComponent(search_by_receptionist_uName_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, 146, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                    .addComponent(search_by_receptionist_userName_btn1, javax.swing.GroupLayout.PREFERRED_SIZE, 162, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGap(0, 0, Short.MAX_VALUE))
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 593, Short.MAX_VALUE))
            .addContainerGap())
    );
    jPanel1Layout.setVerticalGroup(
        jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(jPanel1Layout.createSequentialGroup()
            .addContainerGap()
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                .addComponent(jLabel1)
                .addComponent(search_by_receptionist_uName_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addComponent(search_by_receptionist_userName_btn1))
            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 16, Short.MAX_VALUE)
            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 231, javax.swing.GroupLayout.PREFERRED_SIZE)
            .addContainerGap())
    );

    javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
    getContentPane().setLayout(layout);
    layout.setHorizontalGroup(
        layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
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
        
        search_by_receptionist_uName_textBox1.setText(DfTblMl_1.getValueAt(selectedLine, 1).toString());        
    }//GEN-LAST:event_jTable1MouseClicked

    private void search_by_receptionist_userName_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_search_by_receptionist_userName_btn1ActionPerformed
                
        String uName = search_by_receptionist_uName_textBox1.getText();
       
        String slctQry_1 = String.format("SELECT * FROM `users` WHERE `user` LIKE '%s' AND `receptionist_hotel_name`='%s'",uName, HName);
        try {            
            PreparedStatement PrepaSt_1 = mycon1.devConnect().prepareStatement(slctQry_1);
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            jTable1.setModel(new DefaultTableModel(null, new Object[]{"Recept. ID", "Username", "Password", "First Name", "Last Name", "Hotel?"})); 
            DefaultTableModel DftTM1 = (DefaultTableModel)jTable1.getModel();           
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
    }//GEN-LAST:event_search_by_receptionist_userName_btn1ActionPerformed

    
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
            java.util.logging.Logger.getLogger(info_receptionists_DB_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(info_receptionists_DB_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(info_receptionists_DB_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(info_receptionists_DB_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new info_receptionists_DB_Form().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel jLabel1;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jTable1;
    private javax.swing.JTextField search_by_receptionist_uName_textBox1;
    private javax.swing.JToggleButton search_by_receptionist_userName_btn1;
    // End of variables declaration//GEN-END:variables
}
