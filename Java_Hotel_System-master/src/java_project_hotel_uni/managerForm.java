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
import javax.swing.JFrame;
import static javax.swing.JOptionPane.ERROR_MESSAGE;
import static javax.swing.JOptionPane.showMessageDialog;

public class managerForm extends javax.swing.JFrame {

    my_SQL_Connect_Class mycon1 = new my_SQL_Connect_Class();
    
    public managerForm() {
        initComponents();
    }
    
    String username_of_manager; 
    public String setThings(String manager_username) 
    {
        username_of_manager = manager_username;
        return username_of_manager;
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jButton1 = new javax.swing.JButton();
        jButton2 = new javax.swing.JButton();
        receptionist_username_textBox1 = new javax.swing.JTextField();
        receptionist_password_textBox1 = new javax.swing.JTextField();
        receptionist_first_name_textBox1 = new javax.swing.JTextField();
        receptionist_last_name_textBox1 = new javax.swing.JTextField();
        SuccessOrNot_label1 = new javax.swing.JLabel();
        info_guests_btn1 = new javax.swing.JToggleButton();
        room_rating_btn2 = new javax.swing.JToggleButton();
        info_receptionists_btn3 = new javax.swing.JToggleButton();
        created_reservations_btn4 = new javax.swing.JToggleButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(204, 204, 0));

        jLabel1.setText("Receptionist Username : ");

        jLabel2.setText("Receptionist Password : ");

        jLabel3.setText("Receptionist First Name :");

        jLabel4.setText("Receptionist Last Name :");

        jButton1.setText("Create Receptionist");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        jButton2.setText("CLEAR ALL");
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });

        info_guests_btn1.setText("Info Guests");
        info_guests_btn1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                info_guests_btn1ActionPerformed(evt);
            }
        });

        room_rating_btn2.setText("Room Rating");
        room_rating_btn2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                room_rating_btn2ActionPerformed(evt);
            }
        });

        info_receptionists_btn3.setText("Info Receptionists");
        info_receptionists_btn3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                info_receptionists_btn3ActionPerformed(evt);
            }
        });

        created_reservations_btn4.setText("Created Reservations");
        created_reservations_btn4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                created_reservations_btn4ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(32, 32, 32)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addComponent(jButton1)
                        .addGap(26, 26, 26)
                        .addComponent(jButton2))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel1)
                                .addGap(18, 18, 18)
                                .addComponent(receptionist_username_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, 156, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel2)
                                .addGap(18, 18, 18)
                                .addComponent(receptionist_password_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, 156, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel3)
                                .addGap(18, 18, 18)
                                .addComponent(receptionist_first_name_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, 156, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel4)
                                .addGap(18, 18, 18)
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(receptionist_last_name_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, 156, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(SuccessOrNot_label1, javax.swing.GroupLayout.PREFERRED_SIZE, 51, javax.swing.GroupLayout.PREFERRED_SIZE))))
                        .addGap(32, 32, 32)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(info_guests_btn1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(room_rating_btn2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(info_receptionists_btn3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(created_reservations_btn4, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
                .addContainerGap())
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(30, 30, 30)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel1)
                            .addComponent(receptionist_username_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel2)
                            .addComponent(receptionist_password_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel3)
                            .addComponent(receptionist_first_name_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel4)
                            .addComponent(receptionist_last_name_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(SuccessOrNot_label1, javax.swing.GroupLayout.PREFERRED_SIZE, 18, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jButton1)
                            .addComponent(jButton2)))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(info_guests_btn1)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(room_rating_btn2)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(info_receptionists_btn3)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(created_reservations_btn4)))
                .addContainerGap(24, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    // 'Create Receptionist' button
    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        String _UserName = receptionist_username_textBox1.getText();
        String _UserPassword = receptionist_password_textBox1.getText();
        String _UserFirstName = receptionist_first_name_textBox1.getText();
        String _UserLastName = receptionist_last_name_textBox1.getText();
        
        if(_UserName.equals("") || _UserPassword.equals("") || _UserFirstName.equals("") || _UserLastName.equals(""))
        {
            showMessageDialog(null, "Please fill all of the text boxes! ", "Error", ERROR_MESSAGE);
        }else
        {
            if(AddingUsers(_UserName, _UserPassword, _UserFirstName, _UserLastName)) 
        {
            SuccessOrNot_label1.setText("Successfully Added");
        }else
        {
            SuccessOrNot_label1.setText("Something Went Wrong");
        }
       }

    }//GEN-LAST:event_jButton1ActionPerformed

    
    
    private boolean AddingUsers(String UN, String UP, String UFN, String ULN)
    { 
        String qry = "INSERT INTO `users`(`user`, `pass`, `user_first_name`, `user_last_name`, `receptionist_hotel_name`) VALUES (?,?,?,?,?)";
        String RHN = getHotelNameOfTheManager(username_of_manager); 
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry);
            
            PpdSt_1.setString(1, UN);
            PpdSt_1.setString(2, UP);
            PpdSt_1.setString(3, UFN);
            PpdSt_1.setString(4, ULN);
            PpdSt_1.setString(5, RHN);
                        
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }                
    }
    
    public String getHotelNameOfTheManager(String userName)
    {
        String slctQry_1 = "SELECT `manager_hotel_name` FROM `manager` WHERE `manager_username` = ?";
        try {
            PreparedStatement PrepaSt_1 = mycon1.devConnect().prepareStatement(slctQry_1);
            
            PrepaSt_1.setString(1, userName);
            
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();
            
            if(ResSet_1.next())
            {
                return ResSet_1.getString(1);
            }else
            {
                return "";
            }
            
            } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return "";
        }
    }
    
    //'clear all texfields' button
    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
        receptionist_username_textBox1.setText("");
        receptionist_password_textBox1.setText("");
        receptionist_first_name_textBox1.setText("");
        receptionist_last_name_textBox1.setText("");
    }//GEN-LAST:event_jButton2ActionPerformed

    private void info_guests_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_info_guests_btn1ActionPerformed
        info_guests_DB_Form rF1 = new info_guests_DB_Form();
        rF1.setVisible(true);
        rF1.pack();
        rF1.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
    }//GEN-LAST:event_info_guests_btn1ActionPerformed

    private void room_rating_btn2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_room_rating_btn2ActionPerformed
        Rooms_Type_Form rF1 = new Rooms_Type_Form();
        rF1.setVisible(true);
        rF1.pack();
        rF1.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
    }//GEN-LAST:event_room_rating_btn2ActionPerformed

    private void info_receptionists_btn3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_info_receptionists_btn3ActionPerformed
        info_receptionists_DB_Form rF1 = new info_receptionists_DB_Form();
         rF1.setHotelName(getHotelNameOfTheManager(username_of_manager));
         rF1.activate_addingItemsIntoTable();
        rF1.setVisible(true);
        rF1.pack();        
        rF1.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
    }//GEN-LAST:event_info_receptionists_btn3ActionPerformed

    private void created_reservations_btn4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_created_reservations_btn4ActionPerformed
         info_reservations_DB_Form rF1 = new info_reservations_DB_Form();
        rF1.setVisible(true);
        rF1.pack();
        rF1.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
    }//GEN-LAST:event_created_reservations_btn4ActionPerformed

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
            java.util.logging.Logger.getLogger(managerForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(managerForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(managerForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(managerForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new managerForm().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel SuccessOrNot_label1;
    private javax.swing.JToggleButton created_reservations_btn4;
    private javax.swing.JToggleButton info_guests_btn1;
    private javax.swing.JToggleButton info_receptionists_btn3;
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton2;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JTextField receptionist_first_name_textBox1;
    private javax.swing.JTextField receptionist_last_name_textBox1;
    private javax.swing.JTextField receptionist_password_textBox1;
    private javax.swing.JTextField receptionist_username_textBox1;
    private javax.swing.JToggleButton room_rating_btn2;
    // End of variables declaration//GEN-END:variables
}
