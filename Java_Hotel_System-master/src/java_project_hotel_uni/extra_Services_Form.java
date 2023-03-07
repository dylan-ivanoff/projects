/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package java_project_hotel_uni;

import java.awt.AWTException;
import java.awt.Robot;
import java.awt.event.KeyEvent;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import static javax.swing.JOptionPane.ERROR_MESSAGE;
import static javax.swing.JOptionPane.INFORMATION_MESSAGE;
import static javax.swing.JOptionPane.showMessageDialog;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author kom6i
 */
public class extra_Services_Form extends javax.swing.JFrame {
          
    my_SQL_Connect_Class mycon1 = new my_SQL_Connect_Class();
    GuestClass gcObj1 = new GuestClass();
    
    public extra_Services_Form() {
        initComponents();
        
        addingExtraServicesIntoTable(jTable1); 
    }
    
    String reservation_id;
    String id_guest;
    public void setThings(String id_reserv, String guest_id)
    {
        reservation_id = id_reserv;
        id_guest = guest_id;
    }
    
    public void checkingTheReservationIn_DB()
    {
        if(checkIfThereIsAlreadyAReservationInThe_DB(Integer.valueOf(reservation_id))==1)
        {
            addingExtraServicesInto_ReservationGuest_Table(jTable2);
        }
    }
    
    public int checkIfThereIsAlreadyAReservationInThe_DB(int reserv_ID)
    {        
        String slctQry_1 = String.format("SELECT * FROM `reserv_guest_extra_services` WHERE `id_reservation`='%d'",reserv_ID);
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
    
    public void addingExtraServicesIntoTable(JTable myGuestTable) 
    {                        
        String slctQry_1 = "SELECT * FROM `extra_services`";
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
                line[2] = ResSet_1.getInt(3);
                                   
                DftTM1.addRow(line);
            }
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void addingExtraServicesInto_ReservationGuest_Table(JTable myGuestTable) 
    {                                
        String slctQry_1 = String.format("SELECT `extra_service_id`,`price`,`xtimes`,`total_amount` FROM `reserv_guest_extra_services` WHERE `id_reservation`='%d'", Integer.valueOf(reservation_id));
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
                line[2] = ResSet_1.getInt(3);
                line[3] = ResSet_1.getInt(4);
                                   
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
        quantity_Spinner1 = new javax.swing.JSpinner();
        add_btn1 = new javax.swing.JButton();
        update_btn1 = new javax.swing.JButton();
        delete_btn1 = new javax.swing.JButton();
        add_update_delete_textBox1 = new javax.swing.JTextField();
        jLabel1 = new javax.swing.JLabel();
        confirm_btn1 = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        jLabel2 = new javax.swing.JLabel();
        price_textBox1 = new javax.swing.JTextField();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        extra_services_id_textBox1 = new javax.swing.JTextField();
        jLabel5 = new javax.swing.JLabel();
        jScrollPane3 = new javax.swing.JScrollPane();
        jTable2 = new javax.swing.JTable();
        total_service_price_textBox1 = new javax.swing.JTextField();
        singe_service_price_textBox1 = new javax.swing.JTextField();
        jLabel6 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        jLabel8 = new javax.swing.JLabel();
        update_changes_jTable2_btn1 = new javax.swing.JButton();
        jLabel9 = new javax.swing.JLabel();
        how_many_times_textBox1 = new javax.swing.JTextField();
        jLabel10 = new javax.swing.JLabel();
        extra_service_id_textBox2 = new javax.swing.JTextField();
        clear_all_btn1 = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(102, 255, 255));

        add_btn1.setText("Add");
        add_btn1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                add_btn1ActionPerformed(evt);
            }
        });

        update_btn1.setText("Update");
        update_btn1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                update_btn1ActionPerformed(evt);
            }
        });

        delete_btn1.setText("DELETE");
        delete_btn1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                delete_btn1ActionPerformed(evt);
            }
        });

        add_update_delete_textBox1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                add_update_delete_textBox1ActionPerformed(evt);
            }
        });

        jLabel1.setText("Quantity :");

        confirm_btn1.setText("Confirm");
        confirm_btn1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                confirm_btn1ActionPerformed(evt);
            }
        });

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "ID", "Name", "Price"
            }
        )

    );
    jTable1.addMouseListener(new java.awt.event.MouseAdapter() {
        public void mouseClicked(java.awt.event.MouseEvent evt) {
            jTable1MouseClicked(evt);
        }
    });
    jScrollPane1.setViewportView(jTable1);

    jLabel2.setText("Name of the extra service:");

    jLabel3.setText("Price :");

    jLabel4.setText("ID :");

    jLabel5.setFont(new java.awt.Font("Leelawadee UI", 0, 24)); // NOI18N
    jLabel5.setText("EXTRA SERVICES");

    jTable2.setModel(new javax.swing.table.DefaultTableModel(
        new Object [][] {

        },
        new String [] {
            "Extra Serv. ID", "Price", "x(Times)", "Total Price"
        }
    )

    );
    jTable2.addMouseListener(new java.awt.event.MouseAdapter() {
        public void mouseClicked(java.awt.event.MouseEvent evt) {
            jTable2MouseClicked(evt);
        }
    });
    jScrollPane3.setViewportView(jTable2);

    total_service_price_textBox1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            total_service_price_textBox1ActionPerformed(evt);
        }
    });
    total_service_price_textBox1.addKeyListener(new java.awt.event.KeyAdapter() {
        public void keyPressed(java.awt.event.KeyEvent evt) {
            total_service_price_textBox1KeyPressed(evt);
        }
    });

    singe_service_price_textBox1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            singe_service_price_textBox1ActionPerformed(evt);
        }
    });
    singe_service_price_textBox1.addKeyListener(new java.awt.event.KeyAdapter() {
        public void keyPressed(java.awt.event.KeyEvent evt) {
            singe_service_price_textBox1KeyPressed(evt);
        }
        public void keyReleased(java.awt.event.KeyEvent evt) {
            singe_service_price_textBox1KeyReleased(evt);
        }
    });

    jLabel6.setText("Service Price :");

    jLabel7.setText("(Incl. discount)");

    jLabel8.setText("Total Price :");

    update_changes_jTable2_btn1.setText("Update Changes");
    update_changes_jTable2_btn1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            update_changes_jTable2_btn1ActionPerformed(evt);
        }
    });

    jLabel9.setText("How many times:");

    how_many_times_textBox1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            how_many_times_textBox1ActionPerformed(evt);
        }
    });
    how_many_times_textBox1.addKeyListener(new java.awt.event.KeyAdapter() {
        public void keyPressed(java.awt.event.KeyEvent evt) {
            how_many_times_textBox1KeyPressed(evt);
        }
        public void keyReleased(java.awt.event.KeyEvent evt) {
            how_many_times_textBox1KeyReleased(evt);
        }
    });

    jLabel10.setText("Extra Serv. ID :");

    clear_all_btn1.setText("CLEAR ALL");
    clear_all_btn1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            clear_all_btn1ActionPerformed(evt);
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
                    .addComponent(jLabel5, javax.swing.GroupLayout.PREFERRED_SIZE, 183, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                        .addComponent(delete_btn1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(update_btn1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(add_btn1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(clear_all_btn1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, 117, Short.MAX_VALUE))
                    .addGap(18, 18, 18)
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(jPanel1Layout.createSequentialGroup()
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 0, Short.MAX_VALUE)
                                .addGroup(jPanel1Layout.createSequentialGroup()
                                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                        .addComponent(add_update_delete_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, 155, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(jLabel2))
                                    .addGap(33, 33, 33)
                                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                        .addGroup(jPanel1Layout.createSequentialGroup()
                                            .addComponent(jLabel3)
                                            .addGap(64, 64, 64)
                                            .addComponent(jLabel4))
                                        .addGroup(jPanel1Layout.createSequentialGroup()
                                            .addComponent(price_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, 62, javax.swing.GroupLayout.PREFERRED_SIZE)
                                            .addGap(18, 18, 18)
                                            .addComponent(extra_services_id_textBox1)))))
                            .addGap(0, 0, Short.MAX_VALUE))
                        .addGroup(jPanel1Layout.createSequentialGroup()
                            .addGap(324, 324, 324)
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addComponent(jLabel1)
                                .addComponent(confirm_btn1, javax.swing.GroupLayout.PREFERRED_SIZE, 77, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(quantity_Spinner1, javax.swing.GroupLayout.PREFERRED_SIZE, 75, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGap(18, 18, 18)
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addComponent(jScrollPane3, javax.swing.GroupLayout.PREFERRED_SIZE, 0, Short.MAX_VALUE)
                                .addGroup(jPanel1Layout.createSequentialGroup()
                                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                        .addComponent(update_changes_jTable2_btn1)
                                        .addGroup(jPanel1Layout.createSequentialGroup()
                                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                                .addComponent(jLabel6)
                                                .addComponent(jLabel9)
                                                .addComponent(jLabel8))
                                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                                .addComponent(total_service_price_textBox1)
                                                .addComponent(singe_service_price_textBox1)
                                                .addComponent(how_many_times_textBox1, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 97, Short.MAX_VALUE))
                                            .addGap(18, 18, 18)
                                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                                .addComponent(jLabel7)
                                                .addComponent(jLabel10))
                                            .addGap(18, 18, 18)
                                            .addComponent(extra_service_id_textBox2, javax.swing.GroupLayout.PREFERRED_SIZE, 35, javax.swing.GroupLayout.PREFERRED_SIZE)))
                                    .addGap(0, 0, Short.MAX_VALUE)))))
                    .addGap(25, 25, 25))))
    );
    jPanel1Layout.setVerticalGroup(
        jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
            .addContainerGap()
            .addComponent(jLabel5)
            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 18, Short.MAX_VALUE)
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addComponent(jLabel2, javax.swing.GroupLayout.Alignment.TRAILING)
                .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(jLabel4)))
            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                .addComponent(add_btn1)
                .addComponent(add_update_delete_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addComponent(price_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addComponent(extra_services_id_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addComponent(update_btn1)
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                    .addComponent(delete_btn1)
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                    .addComponent(clear_all_btn1))
                .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(jPanel1Layout.createSequentialGroup()
                            .addComponent(jLabel1)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                            .addComponent(quantity_Spinner1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                            .addComponent(confirm_btn1))
                        .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 149, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(jScrollPane3, javax.swing.GroupLayout.PREFERRED_SIZE, 149, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGap(3, 3, 3)
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(jLabel6)
                        .addComponent(singe_service_price_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(jLabel7))
                    .addGap(2, 2, 2)
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(jLabel9)
                        .addComponent(how_many_times_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(total_service_price_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel10)
                            .addComponent(extra_service_id_textBox2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addComponent(jLabel8, javax.swing.GroupLayout.Alignment.TRAILING))
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                    .addComponent(update_changes_jTable2_btn1)))
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
    
    private void add_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_add_btn1ActionPerformed
              
        try
        {             
            String nameOfTheService = add_update_delete_textBox1.getText();
            int price = Integer.valueOf(price_textBox1.getText());
                                    
            if(AddingExtraServices(nameOfTheService, price) == true)
            {
                showMessageDialog(null, "You have added a service successfully! ", "Successful", INFORMATION_MESSAGE);
                refresh_table();
            }else
            {
                showMessageDialog(null, "You have NOT added a service successfully! ", "ERROR", ERROR_MESSAGE);
            }
            
        }catch(NumberFormatException e)
        {
            showMessageDialog(null, e.getMessage(), "ERROR", ERROR_MESSAGE);
        }
    }//GEN-LAST:event_add_btn1ActionPerformed

    public boolean AddingExtraServices(String name_Service, int price_Service)
    {
        String qry = "INSERT INTO `extra_services`(`es_name`, `es_price`) VALUES (?,?)";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry);
            
            PpdSt_1.setString(1, name_Service);
            PpdSt_1.setInt(2, price_Service);
                        
            return (PpdSt_1.executeUpdate()>0);            
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }                
    }
    
    private void add_update_delete_textBox1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_add_update_delete_textBox1ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_add_update_delete_textBox1ActionPerformed

    private void update_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_update_btn1ActionPerformed
            String nameOfTheService = add_update_delete_textBox1.getText();
            int price = Integer.valueOf(price_textBox1.getText());
            
            if(editingSelectedExtraService(nameOfTheService, price))
            {
                showMessageDialog(null, "You have edited it successfully! ", "Successful", INFORMATION_MESSAGE);
                refresh_table();
            }else
            {
                showMessageDialog(null, "You have NOT edited it successfully! ", "Error", ERROR_MESSAGE);
            }
    }//GEN-LAST:event_update_btn1ActionPerformed

    public boolean editingSelectedExtraService(String name_Service, int price_Service) 
    {

        String qry_editingSelectedGuest = String.format("UPDATE `extra_services` SET `es_name`=?,`es_price`=? WHERE `es_id`='%s'", extra_services_id_textBox1.getText());
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry_editingSelectedGuest);
            
            PpdSt_1.setString(1, name_Service);            
            PpdSt_1.setInt(2, price_Service);
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }
    
    private void delete_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_delete_btn1ActionPerformed
        int extra_service_id = Integer.valueOf(extra_services_id_textBox1.getText());    
            
        if(delExtraService(extra_service_id))
            {
                showMessageDialog(null, "You have deleted it successfully! ", "Successful", INFORMATION_MESSAGE);
                refresh_table();
            }else
            {
                showMessageDialog(null, "You have NOT deleted it successfully! ", "Error", ERROR_MESSAGE);
            }
    }//GEN-LAST:event_delete_btn1ActionPerformed

    public boolean delExtraService(int extra_ser_id) 
    {        
        
        String qryDELETE = "DELETE FROM `extra_services` WHERE `es_id`=?";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qryDELETE);
                        
            PpdSt_1.setInt(1, extra_ser_id);
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }
    
    private void jTable1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jTable1MouseClicked

        DefaultTableModel DfTblMl_1 = (DefaultTableModel)jTable1.getModel();

        int selectedLine = jTable1.getSelectedRow();
        
        extra_services_id_textBox1.setText(DfTblMl_1.getValueAt(selectedLine, 0).toString());
        add_update_delete_textBox1.setText(DfTblMl_1.getValueAt(selectedLine, 1).toString());
        price_textBox1.setText(DfTblMl_1.getValueAt(selectedLine, 2).toString());
        
    }//GEN-LAST:event_jTable1MouseClicked

    private void jTable2MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jTable2MouseClicked
        DefaultTableModel DfTblMl_1 = (DefaultTableModel)jTable2.getModel();

        int selectedLine = jTable2.getSelectedRow();
        
        extra_service_id_textBox2.setText(DfTblMl_1.getValueAt(selectedLine, 0).toString());
        singe_service_price_textBox1.setText(DfTblMl_1.getValueAt(selectedLine, 1).toString());
        how_many_times_textBox1.setText(DfTblMl_1.getValueAt(selectedLine, 2).toString());
        total_service_price_textBox1.setText(DfTblMl_1.getValueAt(selectedLine, 3).toString());
    }//GEN-LAST:event_jTable2MouseClicked

    
    // Confirm quantity button
    private void confirm_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_confirm_btn1ActionPerformed
        if(add_update_delete_textBox1.getText().equals("") || price_textBox1.getText().equals("") || extra_services_id_textBox1.getText().equals(""))
        {
            showMessageDialog(null, "Please select a reservation! ", "Error", ERROR_MESSAGE);
        }else if((Integer)quantity_Spinner1.getValue() <= 0){
            showMessageDialog(null, "Please select a valid value! ", "Error", ERROR_MESSAGE);
        }else
        {
            int reservationID = Integer.parseInt(reservation_id);
            int guestID =  Integer.parseInt(id_guest);
            int extra_service_id = Integer.parseInt(extra_services_id_textBox1.getText());
            int singlePrice = Integer.parseInt(price_textBox1.getText());
            int xTimes = (Integer)quantity_Spinner1.getValue();
            int total_amount = xTimes*singlePrice;
            
            if(AddingExtraServicesInto_ReservationGuest_DB(reservationID, guestID, extra_service_id, singlePrice, xTimes, total_amount))
            {
                showMessageDialog(null, "You added it successfully! ", "Success", JOptionPane.INFORMATION_MESSAGE);
                refresh_table_ReservationGuest();
                
                addRatingToTheGuest();
                                
            }else
            {
                showMessageDialog(null, "You didn't add it successfully! ", "Error", ERROR_MESSAGE);
            }            
        }
    }//GEN-LAST:event_confirm_btn1ActionPerformed

    private void update_changes_jTable2_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_update_changes_jTable2_btn1ActionPerformed
        int servicePrice = Integer.valueOf(singe_service_price_textBox1.getText());
        int howManyTimes = Integer.valueOf(how_many_times_textBox1.getText());
        int TotalPrice = Integer.valueOf(total_service_price_textBox1.getText());

        if(editingSelectedRow_ReservationGuest(servicePrice, howManyTimes, TotalPrice))
        {
            showMessageDialog(null, "You have edited it successfully! ", "Successful", INFORMATION_MESSAGE);
            refresh_table_ReservationGuest();
            
          //  int index = Integer.valueOf(total_service_price_textBox1.getText())/100;
          //  gcObj1.guest_Rating_extra_services(Integer.valueOf(id_guest), index);
        }else
        {
            showMessageDialog(null, "You have NOT edited it successfully! ", "Error", ERROR_MESSAGE);
        }
    }//GEN-LAST:event_update_changes_jTable2_btn1ActionPerformed

    public void addRatingToTheGuest()
    {
        int index = Integer.valueOf(price_textBox1.getText())*(Integer)quantity_Spinner1.getValue()/100;
        gcObj1.guest_Rating_extra_services(Integer.valueOf(id_guest), index);
    }
            
    private void clear_all_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_clear_all_btn1ActionPerformed
        add_update_delete_textBox1.setText("");
        price_textBox1.setText("");
        extra_services_id_textBox1.setText("");
        quantity_Spinner1.setValue(0);
    }//GEN-LAST:event_clear_all_btn1ActionPerformed

    private void how_many_times_textBox1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_how_many_times_textBox1ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_how_many_times_textBox1ActionPerformed

    private void singe_service_price_textBox1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_singe_service_price_textBox1ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_singe_service_price_textBox1ActionPerformed

    private void total_service_price_textBox1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_total_service_price_textBox1ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_total_service_price_textBox1ActionPerformed

    Robot rob;
    public void restrictTextFieldsInput(java.awt.event.KeyEvent evt) //Позволява (в случая) числата само от 0-9, backspace и delete
    {
        try {
            rob= new Robot();
            char c = evt.getKeyChar();
            if (!((c >= '0') && (c <= '9') ||
                    (c == KeyEvent.VK_BACK_SPACE) ||
                    (c == KeyEvent.VK_DELETE))) {
                getToolkit().beep();                    
                    rob.keyPress(KeyEvent.VK_BACK_SPACE);
                    rob.keyRelease(KeyEvent.VK_BACK_SPACE);                   
                evt.consume();
            }} catch (AWTException ex) {
            Logger.getLogger(extra_Services_Form.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void computeTotalSum()
    {
        if(how_many_times_textBox1.getText().equals("") || singe_service_price_textBox1.getText().equals("") || extra_service_id_textBox2.getText().equals(""))
        {}else{
            int totalAmount = Integer.valueOf(singe_service_price_textBox1.getText())*Integer.valueOf(how_many_times_textBox1.getText());
            total_service_price_textBox1.setText(String.format("%d",totalAmount));
        }
    }
    
    private void singe_service_price_textBox1KeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_singe_service_price_textBox1KeyPressed
        restrictTextFieldsInput(evt);                
    }//GEN-LAST:event_singe_service_price_textBox1KeyPressed

    private void how_many_times_textBox1KeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_how_many_times_textBox1KeyPressed
        restrictTextFieldsInput(evt);      
    }//GEN-LAST:event_how_many_times_textBox1KeyPressed

    private void total_service_price_textBox1KeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_total_service_price_textBox1KeyPressed
        restrictTextFieldsInput(evt);
    }//GEN-LAST:event_total_service_price_textBox1KeyPressed

    private void singe_service_price_textBox1KeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_singe_service_price_textBox1KeyReleased
        computeTotalSum();
    }//GEN-LAST:event_singe_service_price_textBox1KeyReleased

    private void how_many_times_textBox1KeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_how_many_times_textBox1KeyReleased
        computeTotalSum();
    }//GEN-LAST:event_how_many_times_textBox1KeyReleased

    
    
    public boolean editingSelectedRow_ReservationGuest(int price, int xTimes, int totalAmount) 
    {
        String qry_editingSelectedGuest = String.format("UPDATE `reserv_guest_extra_services` SET `price`=?,`xtimes`=?, `total_amount`=? WHERE `extra_service_id`='%d'", Integer.valueOf(extra_service_id_textBox2.getText()));
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry_editingSelectedGuest);
            
            PpdSt_1.setInt(1, price);            
            PpdSt_1.setInt(2, xTimes);
            PpdSt_1.setInt(3, totalAmount);
            
            return (PpdSt_1.executeUpdate() > 0);
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }  
    }
    
    public boolean AddingExtraServicesInto_ReservationGuest_DB(int id_reserv, int guestID, int extraServiceID, int single_price, int x_times, int totalAmount)
    {
        String qry = "INSERT INTO `reserv_guest_extra_services`(`id_reservation`, `guest_id`, `extra_service_id`, `price`, `xtimes`, `total_amount`) VALUES (?,?,?,?,?,?)";
        
        try {
            PreparedStatement PpdSt_1 = mycon1.devConnect().prepareStatement(qry);
            
            PpdSt_1.setInt(1, id_reserv);
            PpdSt_1.setInt(2, guestID);
            PpdSt_1.setInt(3, extraServiceID);
            PpdSt_1.setInt(4, single_price);
            PpdSt_1.setInt(5, x_times);
            PpdSt_1.setInt(6, totalAmount);
                        
            return (PpdSt_1.executeUpdate()>0);            
            
        } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }                
    }
    
    // Refresh table method - jTable1
    private void refresh_table(){                                                   
       jTable1.setModel(new DefaultTableModel(null, new Object[]{"ID", "Name", "Price"})); 
        
       addingExtraServicesIntoTable(jTable1);
    } 
    
    // Refresh table method - jTable2
    private void refresh_table_ReservationGuest(){                                                   
       jTable2.setModel(new DefaultTableModel(null, new Object[]{"Extra Serv. ID", "Price", "x(Times)", "Total Price"})); 
        
       addingExtraServicesInto_ReservationGuest_Table(jTable2);
    } 
    
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
            java.util.logging.Logger.getLogger(extra_Services_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(extra_Services_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(extra_Services_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(extra_Services_Form.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new extra_Services_Form().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton add_btn1;
    private javax.swing.JTextField add_update_delete_textBox1;
    private javax.swing.JButton clear_all_btn1;
    private javax.swing.JButton confirm_btn1;
    private javax.swing.JButton delete_btn1;
    private javax.swing.JTextField extra_service_id_textBox2;
    private javax.swing.JTextField extra_services_id_textBox1;
    private javax.swing.JTextField how_many_times_textBox1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane3;
    private javax.swing.JTable jTable1;
    private javax.swing.JTable jTable2;
    private javax.swing.JTextField price_textBox1;
    private javax.swing.JSpinner quantity_Spinner1;
    private javax.swing.JTextField singe_service_price_textBox1;
    private javax.swing.JTextField total_service_price_textBox1;
    private javax.swing.JButton update_btn1;
    private javax.swing.JButton update_changes_jTable2_btn1;
    // End of variables declaration//GEN-END:variables
}
