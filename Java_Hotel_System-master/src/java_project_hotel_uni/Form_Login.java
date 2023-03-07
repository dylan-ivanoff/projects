
package java_project_hotel_uni;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import static javax.swing.JOptionPane.ERROR_MESSAGE; 
import static javax.swing.JOptionPane.showMessageDialog; 


public class Form_Login extends javax.swing.JFrame {

    
    public Form_Login() {
        initComponents();
        
    }

    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jInternalFrame1 = new javax.swing.JInternalFrame();
        buttonGroup1 = new javax.swing.ButtonGroup();
        jPanel1 = new javax.swing.JPanel();
        jPanel2 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        textBox1_user = new javax.swing.JTextField();
        jLabel3 = new javax.swing.JLabel();
        btn1_login = new javax.swing.JButton();
        textBox2_pass = new javax.swing.JPasswordField();
        admin_RadioButton = new javax.swing.JRadioButton();
        owner_RadioButton = new javax.swing.JRadioButton();
        manager_RadioButton = new javax.swing.JRadioButton();
        receptionist_RadioButton = new javax.swing.JRadioButton();

        jInternalFrame1.setVisible(true);

        javax.swing.GroupLayout jInternalFrame1Layout = new javax.swing.GroupLayout(jInternalFrame1.getContentPane());
        jInternalFrame1.getContentPane().setLayout(jInternalFrame1Layout);
        jInternalFrame1Layout.setHorizontalGroup(
            jInternalFrame1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 0, Short.MAX_VALUE)
        );
        jInternalFrame1Layout.setVerticalGroup(
            jInternalFrame1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 0, Short.MAX_VALUE)
        );

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(102, 255, 102));

        jPanel2.setBackground(new java.awt.Color(102, 255, 255));

        jLabel1.setFont(new java.awt.Font("Yu Gothic UI Semibold", 3, 32)); // NOI18N
        jLabel1.setText("USER LOGIN SYSTEM");

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel2Layout.createSequentialGroup()
                .addContainerGap(131, Short.MAX_VALUE)
                .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 326, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(91, 91, 91))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addGap(28, 28, 28)
                .addComponent(jLabel1)
                .addContainerGap(55, Short.MAX_VALUE))
        );

        jLabel2.setFont(new java.awt.Font("Corbel Light", 3, 18)); // NOI18N
        jLabel2.setText("USERNAME: ");

        textBox1_user.setFont(new java.awt.Font("Tahoma", 2, 18)); // NOI18N
        textBox1_user.setText("hoteltest");

        jLabel3.setFont(new java.awt.Font("Corbel Light", 3, 18)); // NOI18N
        jLabel3.setText("PASSWORD: ");

        btn1_login.setBackground(new java.awt.Color(153, 0, 51));
        btn1_login.setFont(new java.awt.Font("Yu Gothic", 1, 24)); // NOI18N
        btn1_login.setText("LOGIN");
        btn1_login.setBorder(new javax.swing.border.MatteBorder(null));
        btn1_login.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        btn1_login.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn1_loginActionPerformed(evt);
            }
        });

        textBox2_pass.setFont(new java.awt.Font("Tahoma", 0, 18)); // NOI18N
        textBox2_pass.setText("testpass");

        buttonGroup1.add(admin_RadioButton);
        admin_RadioButton.setText("Admin");

        buttonGroup1.add(owner_RadioButton);
        owner_RadioButton.setText("Owner");

        buttonGroup1.add(manager_RadioButton);
        manager_RadioButton.setText("Manager");

        buttonGroup1.add(receptionist_RadioButton);
        receptionist_RadioButton.setText("Receptionist");

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(21, 21, 21)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(owner_RadioButton)
                            .addComponent(manager_RadioButton)
                            .addComponent(receptionist_RadioButton))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(btn1_login, javax.swing.GroupLayout.PREFERRED_SIZE, 122, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(62, 62, 62))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(admin_RadioButton)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                                        .addComponent(jLabel2)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED))
                                    .addGroup(jPanel1Layout.createSequentialGroup()
                                        .addComponent(jLabel3)
                                        .addGap(7, 7, 7)))
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addComponent(textBox2_pass, javax.swing.GroupLayout.DEFAULT_SIZE, 257, Short.MAX_VALUE)
                                    .addComponent(textBox1_user))))
                        .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(26, 26, 26)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(40, 40, 40)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2)
                    .addComponent(textBox1_user, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(textBox2_pass, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(btn1_login, javax.swing.GroupLayout.PREFERRED_SIZE, 34, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(45, 45, 45))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(17, 17, 17)
                        .addComponent(admin_RadioButton)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(owner_RadioButton)
                        .addGap(3, 3, 3)
                        .addComponent(manager_RadioButton)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 4, Short.MAX_VALUE)
                        .addComponent(receptionist_RadioButton)
                        .addContainerGap())))
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

    private void btn1_loginActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn1_loginActionPerformed
        
        PreparedStatement PreS1 = null;
        ResultSet ResS1;
        
        String uName = textBox1_user.getText(); 
        String uPass = String.valueOf(textBox2_pass.getPassword()); 
                
        if(uName.length() <= 4)
        {
            showMessageDialog(null, "Your username should be longer! ", "Error", ERROR_MESSAGE);            
        }else if(uPass.length() <=4 )
        {
            showMessageDialog(null, "Your password should be longer! ", "Error", ERROR_MESSAGE); 
        }
        
        my_SQL_Connect_Class obj1 = new my_SQL_Connect_Class();
        
        if(admin_RadioButton.isSelected()) 
        {
            String slcQry = "SELECT * FROM `admin` WHERE `admin_username`=? AND `admin_password`=?";
        
        try {
            PreS1 = obj1.devConnect().prepareStatement(slcQry);
            PreS1.setString(1, uName);
            PreS1.setString(2, uPass);
            ResS1 = PreS1.executeQuery();
            
            adminForm ins1 = new adminForm(); 

            if(ResS1.next() == true) //user: admin и парола: 123456
            {                   
                ins1.setVisible(true);
                ins1.pack();                
                this.dispose();
                
            }else
            {
                showMessageDialog(null, "Wrong Data! ", "Error", ERROR_MESSAGE); 
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(Form_Login.class.getName()).log(Level.SEVERE, null, ex);
        }
        }else if(owner_RadioButton.isSelected())
        {
                String slcQry = "SELECT * FROM `owners` WHERE `owners_username`=? AND `owners_password`=?";
        
        try {
            PreS1 = obj1.devConnect().prepareStatement(slcQry);
            PreS1.setString(1, uName);
            PreS1.setString(2, uPass);
            ResS1 = PreS1.executeQuery();
            
            ownersForm ins1 = new ownersForm();             

            if(ResS1.next() == true) //user: owner и парола: 123456
            {                   
                ins1.setVisible(true);
                ins1.setThings(textBox1_user.getText()); //При успешно влизане задава (чрез метода 'setThings()' ) стойност на променливата 'username_of_onwer' от 'ownerForm' класа 
                
                ins1.pack();                
                this.dispose();
                
            }else
            {
                showMessageDialog(null, "Wrong Data! ", "Error", ERROR_MESSAGE); 
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(Form_Login.class.getName()).log(Level.SEVERE, null, ex);
        }
        }else if(manager_RadioButton.isSelected())
        {
            String slcQry = "SELECT * FROM `manager` WHERE `manager_username`=? AND `manager_password`=?";
        
        try {
            PreS1 = obj1.devConnect().prepareStatement(slcQry);
            PreS1.setString(1, uName);
            PreS1.setString(2, uPass);
            ResS1 = PreS1.executeQuery();            
            
            managerForm ins1 = new managerForm(); 

            if(ResS1.next() == true) //user: manager и парола: 123456
            {                   
                ins1.setVisible(true);
                ins1.setThings(textBox1_user.getText()); //При успешно влизане задава (чрез метода 'setThings()' ) стойност на променливата 'username_of_manager' от 'managerForm' класа 
                
                ins1.pack();                
                this.dispose();
                
            }else
            {
                showMessageDialog(null, "Wrong Data! ", "Error", ERROR_MESSAGE); 
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(Form_Login.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        }else if(receptionist_RadioButton.isSelected())
        {
            String slcQry = "SELECT * FROM `users` WHERE `user`=? AND `pass`=?";
        
        try {
            PreS1 = obj1.devConnect().prepareStatement(slcQry);
            PreS1.setString(1, uName);
            PreS1.setString(2, uPass);
            ResS1 = PreS1.executeQuery();            
            
            Receptionist_Form ins1 = new Receptionist_Form(); 

            if(ResS1.next() == true) //user: hoteltest и парола: testpass
            {                   
                ins1.setVisible(true);
                ins1.setThings(textBox1_user.getText());
                ins1.pack();                
                this.dispose();
                
            }else
            {
                showMessageDialog(null, "Wrong Data! ", "Error", ERROR_MESSAGE); 
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(Form_Login.class.getName()).log(Level.SEVERE, null, ex);
        }
        }else
        {
            showMessageDialog(null, "Please select a radio button! ", "Error", ERROR_MESSAGE); 
        }
                
    }//GEN-LAST:event_btn1_loginActionPerformed

    public static void main(String args[]) {
        
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Form_Login().setVisible(true);
            }
        });
    }        
    
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JRadioButton admin_RadioButton;
    private javax.swing.JButton btn1_login;
    private javax.swing.ButtonGroup buttonGroup1;
    private javax.swing.JInternalFrame jInternalFrame1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JRadioButton manager_RadioButton;
    private javax.swing.JRadioButton owner_RadioButton;
    private javax.swing.JRadioButton receptionist_RadioButton;
    private javax.swing.JTextField textBox1_user;
    private javax.swing.JPasswordField textBox2_pass;
    // End of variables declaration//GEN-END:variables
}
