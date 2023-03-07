
package java_project_hotel_uni;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.util.Calendar;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;
import static javax.swing.JOptionPane.ERROR_MESSAGE;
import static javax.swing.JOptionPane.INFORMATION_MESSAGE;
import static javax.swing.JOptionPane.showMessageDialog;
import javax.swing.table.DefaultTableModel;
import javax.swing.JFrame;
import javax.swing.JOptionPane;

/**
 *
 * @author kom6i
 */
public class reservationsForm extends javax.swing.JFrame {

    Reservation_Class reserv_class_obj1 = new Reservation_Class();
    my_SQL_Connect_Class mysqlconn_reservation_obj1 = new my_SQL_Connect_Class();
    GuestClass gcObj1 = new GuestClass();
    
    public reservationsForm() {
        initComponents();
        
        reserv_class_obj1.addingReservationsIntoTable(jTable1);
        
        textBox1_Reservation_ID.setEditable(false); //Не позволява писане в полето
    }
    
    
    String username_of_recept; 
    public String setThings(String recept_username) 
    {
        username_of_recept = recept_username;
        return username_of_recept;
    }


    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        textBox1_Guest_ID = new javax.swing.JTextField();
        textBox1_Reservation_ID = new javax.swing.JTextField();
        textBox1_Room_Number = new javax.swing.JTextField();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        btn1_reservation_creation = new javax.swing.JButton();
        btn1_reservation_edit = new javax.swing.JButton();
        btn1_guests_remove = new javax.swing.JButton();
        btn1_guests_clear = new javax.swing.JButton();
        SuccessOrNot_label1 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        btn1_guests_clear1 = new javax.swing.JButton();
        jLabel1 = new javax.swing.JLabel();
        type_of_cancellation_textBox1 = new javax.swing.JTextField();
        most_recent_reservations_btn1 = new javax.swing.JButton();
        show_all_reservations_btn2 = new javax.swing.JButton();
        extra_services_btn1 = new javax.swing.JButton();
        dateChooser_Date_Came = new com.toedter.calendar.JDateChooser();
        dateChooser_Date_Went = new com.toedter.calendar.JDateChooser();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(102, 255, 102));

        jLabel2.setBackground(new java.awt.Color(255, 255, 255));
        jLabel2.setFont(new java.awt.Font("Lucida Bright", 0, 14)); // NOI18N
        jLabel2.setText("ID:");

        jLabel3.setFont(new java.awt.Font("Lucida Bright", 0, 14)); // NOI18N
        jLabel3.setText("Guest ID:");

        jLabel4.setFont(new java.awt.Font("Lucida Bright", 0, 14)); // NOI18N
        jLabel4.setText("Date Came :");

        jLabel5.setFont(new java.awt.Font("Lucida Bright", 0, 14)); // NOI18N
        jLabel5.setText("Room Num :");

        jLabel6.setFont(new java.awt.Font("Lucida Bright", 0, 14)); // NOI18N
        jLabel6.setText("Date Went :");

        textBox1_Guest_ID.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        textBox1_Guest_ID.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                textBox1_Guest_IDActionPerformed(evt);
            }
        });

        textBox1_Reservation_ID.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N

        textBox1_Room_Number.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        textBox1_Room_Number.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                textBox1_Room_NumberActionPerformed(evt);
            }
        });

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Reservation ID", "Guest ID", "Room Number", "Date_Came", "Date_went", "Cancelled Reserv."
            }
        )

    );
    jTable1.addMouseListener(new java.awt.event.MouseAdapter() {
        public void mouseClicked(java.awt.event.MouseEvent evt) {
            jTable1MouseClicked(evt);
        }
    });
    jScrollPane1.setViewportView(jTable1);

    btn1_reservation_creation.setBackground(new java.awt.Color(102, 0, 102));
    btn1_reservation_creation.setFont(new java.awt.Font("Lucida Console", 0, 11)); // NOI18N
    btn1_reservation_creation.setForeground(new java.awt.Color(255, 255, 255));
    btn1_reservation_creation.setText("New Reservation Creation");
    btn1_reservation_creation.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
    btn1_reservation_creation.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            btn1_reservation_creationActionPerformed(evt);
        }
    });

    btn1_reservation_edit.setBackground(new java.awt.Color(102, 0, 102));
    btn1_reservation_edit.setFont(new java.awt.Font("Lucida Console", 0, 11)); // NOI18N
    btn1_reservation_edit.setForeground(new java.awt.Color(255, 255, 255));
    btn1_reservation_edit.setText("Edit Existing Guest");
    btn1_reservation_edit.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
    btn1_reservation_edit.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            btn1_reservation_editActionPerformed(evt);
        }
    });

    btn1_guests_remove.setBackground(new java.awt.Color(102, 0, 102));
    btn1_guests_remove.setFont(new java.awt.Font("Lucida Console", 0, 11)); // NOI18N
    btn1_guests_remove.setForeground(new java.awt.Color(255, 255, 255));
    btn1_guests_remove.setText("Remove Existing Guest");
    btn1_guests_remove.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
    btn1_guests_remove.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            btn1_guests_removeActionPerformed(evt);
        }
    });

    btn1_guests_clear.setBackground(new java.awt.Color(102, 0, 102));
    btn1_guests_clear.setFont(new java.awt.Font("Lucida Console", 0, 11)); // NOI18N
    btn1_guests_clear.setForeground(new java.awt.Color(255, 255, 255));
    btn1_guests_clear.setText("Clear");
    btn1_guests_clear.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
    btn1_guests_clear.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            btn1_guests_clearActionPerformed(evt);
        }
    });

    jLabel7.setFont(new java.awt.Font("Microsoft Yi Baiti", 1, 36)); // NOI18N
    jLabel7.setText("RESERVATIONS");

    btn1_guests_clear1.setBackground(new java.awt.Color(102, 0, 102));
    btn1_guests_clear1.setFont(new java.awt.Font("Lucida Console", 0, 11)); // NOI18N
    btn1_guests_clear1.setForeground(new java.awt.Color(255, 255, 255));
    btn1_guests_clear1.setText("REFRESH");
    btn1_guests_clear1.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
    btn1_guests_clear1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            btn1_guests_clear1ActionPerformed(evt);
        }
    });

    jLabel1.setFont(new java.awt.Font("Lucida Bright", 0, 14)); // NOI18N
    jLabel1.setText("Type Of Cancellation :");

    most_recent_reservations_btn1.setBackground(new java.awt.Color(204, 0, 51));
    most_recent_reservations_btn1.setFont(new java.awt.Font("Yu Gothic", 1, 12)); // NOI18N
    most_recent_reservations_btn1.setText("Most Recent");
    most_recent_reservations_btn1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            most_recent_reservations_btn1ActionPerformed(evt);
        }
    });

    show_all_reservations_btn2.setBackground(new java.awt.Color(204, 0, 51));
    show_all_reservations_btn2.setFont(new java.awt.Font("Yu Gothic", 1, 12)); // NOI18N
    show_all_reservations_btn2.setText("Show All");
    show_all_reservations_btn2.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            show_all_reservations_btn2ActionPerformed(evt);
        }
    });

    extra_services_btn1.setBackground(new java.awt.Color(102, 0, 102));
    extra_services_btn1.setFont(new java.awt.Font("Lucida Console", 0, 11)); // NOI18N
    extra_services_btn1.setForeground(new java.awt.Color(255, 255, 255));
    extra_services_btn1.setText("Extra Services");
    extra_services_btn1.addActionListener(new java.awt.event.ActionListener() {
        public void actionPerformed(java.awt.event.ActionEvent evt) {
            extra_services_btn1ActionPerformed(evt);
        }
    });

    javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
    jPanel1.setLayout(jPanel1Layout);
    jPanel1Layout.setHorizontalGroup(
        jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(jPanel1Layout.createSequentialGroup()
            .addGap(74, 74, 74)
            .addComponent(jLabel7)
            .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        .addGroup(jPanel1Layout.createSequentialGroup()
            .addContainerGap()
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                        .addComponent(btn1_guests_clear, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(btn1_guests_remove, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(btn1_reservation_creation, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(btn1_reservation_edit, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(SuccessOrNot_label1))
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                        .addComponent(jLabel2)
                        .addGroup(jPanel1Layout.createSequentialGroup()
                            .addComponent(jLabel4)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                            .addComponent(dateChooser_Date_Came, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                        .addComponent(jLabel3)
                        .addGroup(jPanel1Layout.createSequentialGroup()
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addComponent(jLabel5)
                                .addComponent(jLabel6))
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addGroup(jPanel1Layout.createSequentialGroup()
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                        .addComponent(textBox1_Guest_ID, javax.swing.GroupLayout.PREFERRED_SIZE, 132, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(textBox1_Room_Number, javax.swing.GroupLayout.PREFERRED_SIZE, 132, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(textBox1_Reservation_ID, javax.swing.GroupLayout.PREFERRED_SIZE, 132, javax.swing.GroupLayout.PREFERRED_SIZE)))
                                .addGroup(jPanel1Layout.createSequentialGroup()
                                    .addGap(7, 7, 7)
                                    .addComponent(dateChooser_Date_Went, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))))
                    .addGap(0, 24, Short.MAX_VALUE)))
            .addGap(18, 18, 18)
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addComponent(btn1_guests_clear1)
                    .addGap(39, 39, 39)
                    .addComponent(jLabel1)
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                    .addComponent(type_of_cancellation_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, 139, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGap(0, 0, Short.MAX_VALUE))
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addComponent(extra_services_btn1, javax.swing.GroupLayout.PREFERRED_SIZE, 135, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(most_recent_reservations_btn1, javax.swing.GroupLayout.PREFERRED_SIZE, 135, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGap(18, 18, 18)
                    .addComponent(show_all_reservations_btn2, javax.swing.GroupLayout.PREFERRED_SIZE, 135, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                    .addGap(0, 0, Short.MAX_VALUE)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 678, javax.swing.GroupLayout.PREFERRED_SIZE)))
            .addContainerGap())
    );
    jPanel1Layout.setVerticalGroup(
        jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
        .addGroup(jPanel1Layout.createSequentialGroup()
            .addContainerGap()
            .addComponent(jLabel7)
            .addGap(19, 19, 19)
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addComponent(btn1_guests_clear1)
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(jPanel1Layout.createSequentialGroup()
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                .addGroup(jPanel1Layout.createSequentialGroup()
                                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jLabel2)
                                        .addComponent(textBox1_Reservation_ID, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                                    .addGap(25, 25, 25)
                                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jLabel3)
                                        .addComponent(textBox1_Guest_ID, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                                    .addGap(27, 27, 27)
                                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jLabel5)
                                        .addComponent(textBox1_Room_Number, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                                    .addGap(22, 22, 22)
                                    .addComponent(jLabel4))
                                .addComponent(dateChooser_Date_Came, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addGroup(jPanel1Layout.createSequentialGroup()
                                    .addGap(25, 25, 25)
                                    .addComponent(jLabel6))
                                .addGroup(jPanel1Layout.createSequentialGroup()
                                    .addGap(18, 18, 18)
                                    .addComponent(dateChooser_Date_Went, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                .addComponent(btn1_reservation_creation)
                                .addComponent(SuccessOrNot_label1))
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                            .addComponent(btn1_reservation_edit))
                        .addComponent(jScrollPane1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 259, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                    .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(btn1_guests_remove)
                        .addComponent(most_recent_reservations_btn1)
                        .addComponent(show_all_reservations_btn2)
                        .addComponent(extra_services_btn1))
                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                    .addComponent(btn1_guests_clear))
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(type_of_cancellation_textBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
            .addContainerGap(14, Short.MAX_VALUE))
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

        textBox1_Reservation_ID.setText(DfTblMl_1.getValueAt(selectedLine, 0).toString()); 
        textBox1_Guest_ID.setText(DfTblMl_1.getValueAt(selectedLine, 1).toString());        
        textBox1_Room_Number.setText(DfTblMl_1.getValueAt(selectedLine, 2).toString()); 
        
        String dateValue = DfTblMl_1.getValueAt(selectedLine, 3).toString();
        String dateValue1 = DfTblMl_1.getValueAt(selectedLine, 4).toString();

        
        Date date = new Date();
        dateChooser_Date_Came.setDate(date);
        dateChooser_Date_Went.setDate(date);
        
                        
    }//GEN-LAST:event_jTable1MouseClicked

    private void btn1_reservation_creationActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn1_reservation_creationActionPerformed
        
        try
        {
            int Guest_ID = Integer.valueOf(textBox1_Guest_ID.getText()); 
            int Room_Number = Integer.valueOf(textBox1_Room_Number.getText());
            // String Cancel_Reserv = type_of_cancellation_textBox1.getText();
            
            // ------------
            SimpleDateFormat Date_Format = new SimpleDateFormat("yyyy-MM-dd");
            java.util.Date dateCame_var = dateChooser_Date_Came.getDate();
            java.util.Date dateWent_var = dateChooser_Date_Went.getDate();
            String dateCame = Date_Format.format(dateCame_var);
            String Date_Went = Date_Format.format(dateWent_var);
            
            
            java.util.Date today = new java.util.Date();
            try {  
                java.util.Date dateIn=new SimpleDateFormat("yyyy-MM-dd").parse(dateCame);
                java.util.Date dateOut=new SimpleDateFormat("yyyy-MM-dd").parse(Date_Went);
                
                if(!(dateIn.after(today) || dateIn.after(today)))
                {
                    
                    showMessageDialog(null, "The date in should be after or equal to today ", "ERROR", ERROR_MESSAGE);
                } 
                else if(dateOut.before(dateIn)) 
                {
                    showMessageDialog(null, "The date out should be after or equal to the day of arrival ", "ERROR", ERROR_MESSAGE);
                }else
                {
                    if(checking_for_NEGATIVE_rating(Guest_ID)<0)
                    {
                        int dialogButton = JOptionPane.YES_NO_OPTION;
                    int dialogResult = JOptionPane.showConfirmDialog(this, "LOW RATING GUEST! Do you still want to create a reservation?", "WARNING", dialogButton);
                    if(dialogResult == 0) {
                         if(reserv_class_obj1.AddingReservation(Guest_ID, Room_Number, dateCame, Date_Went, username_of_recept) == true)
                      {
                        showMessageDialog(null, "You have added a reservation successfully! ", "Successful", INFORMATION_MESSAGE);
                        refresh_table();
                        
                        addingGuestRating_DB(Guest_ID, dateCame, Date_Went, Room_Number);
                      }
                    else
                        {
                        showMessageDialog(null, "You have NOT added a reservation successfully! ", "ERROR", ERROR_MESSAGE);
                        }
                    } else {
                         // this.dispose();
                    } 
                    }else
                    {
                        if(reserv_class_obj1.AddingReservation(Guest_ID, Room_Number, dateCame, Date_Went, username_of_recept) == true)
                      {
                        showMessageDialog(null, "You have added a reservation successfully! ", "Successful", INFORMATION_MESSAGE);
                        refresh_table();
                        
                        addingGuestRating_DB(Guest_ID, dateCame, Date_Went, Room_Number);
                      }
                    else
                        {
                        showMessageDialog(null, "You have NOT added a reservation successfully! ", "ERROR", ERROR_MESSAGE);
                        } 
                    }
                                                               
                }
                
            } catch (ParseException ex) {
                Logger.getLogger(reservationsForm.class.getName()).log(Level.SEVERE, null, ex);
            }
           
        }catch(NumberFormatException e)
        {
            showMessageDialog(null, e.getMessage(), "ERROR", ERROR_MESSAGE);
        }  
        
    }//GEN-LAST:event_btn1_reservation_creationActionPerformed

    public int checking_for_NEGATIVE_rating(int Guest_ID)
    {
        String slctQry_1 = "SELECT `guest_rating` FROM `guesttable` WHERE `gID` = ?";
        try {
            PreparedStatement PrepaSt_1 = mysqlconn_reservation_obj1.devConnect().prepareStatement(slctQry_1);
            
            PrepaSt_1.setInt(1, Guest_ID);
            
            ResultSet ResSet_1 = PrepaSt_1.executeQuery();            
            
            if(ResSet_1.next())
            {
                return Integer.valueOf(ResSet_1.getString(1));
            }else
            {
                return 0;
            }
            
            } catch (SQLException ex) {
            Logger.getLogger(GuestClass.class.getName()).log(Level.SEVERE, null, ex);
            return 0;
        }
    }
    
    public void addingGuestRating_DB(int Guest_ID, String dateCame, String Date_Went, int Room_Number)
    {
        int rType = getRoomType(Room_Number);
        
        int roomPrice = Integer.valueOf(getRoomPrice(rType));
        
        int num_of_days = numOfDaysInHotel(dateCame, Date_Went);
        
        int index = num_of_days*roomPrice/100;
        gcObj1.guest_Rating_reservation(Guest_ID, index);
    }
    
    public void substractingGuestRating_DB(int Guest_ID, String dateCame, String Date_Went, int Room_Number)
    {
        int rType = getRoomType(Room_Number);
        
        int roomPrice = Integer.valueOf(getRoomPrice(rType));
        
        int num_of_days = numOfDaysInHotel(dateCame, Date_Went);
        
        int index = (int) (num_of_days*roomPrice/100*(-1.5));
        gcObj1.guest_Rating_reservation(Guest_ID, index);
    }
    
    public int getRoomType(int Room_Number)
    {
        String slctQry_1 = "SELECT `Rtype` FROM `rooms` WHERE `Rnumber` = ?";
        try {
            PreparedStatement PrepaSt_1 = mysqlconn_reservation_obj1.devConnect().prepareStatement(slctQry_1);
            
            PrepaSt_1.setInt(1, Room_Number);
            
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
    
    public String getRoomPrice(int Room_Type)
    {
        String slctQry_1 = "SELECT `Rprice` FROM `roomtype` WHERE `Rid` = ?";
        try {
            PreparedStatement PrepaSt_1 = mysqlconn_reservation_obj1.devConnect().prepareStatement(slctQry_1);
            
            PrepaSt_1.setInt(1, Room_Type);
            
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
    
    
    //Броят на дните през които клиентът е бил в хотела
    public int numOfDaysInHotel(String dateCame, String Date_Went)
    {
        LocalDate DateCame = LocalDate.parse(dateCame);
        LocalDate DateWent = LocalDate.parse(Date_Went);
                
        long daysBetween = java.time.temporal.ChronoUnit.DAYS.between(DateCame, DateWent);
        
        return (int)daysBetween;
    }
    
    private void btn1_reservation_editActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn1_reservation_editActionPerformed
    
    try
    {
        int reserID = Integer.valueOf(textBox1_Reservation_ID.getText()); 
        int guestID = Integer.valueOf(textBox1_Guest_ID.getText());
        int rNumber = Integer.valueOf(textBox1_Room_Number.getText());
        
        
         
        // -- -- -- -- -- 
        SimpleDateFormat Date_Format = new SimpleDateFormat("yyyy-MM-dd");
        java.util.Date dateCame_var = dateChooser_Date_Came.getDate();
        java.util.Date dateWent_var = dateChooser_Date_Went.getDate();
        String dateCame = Date_Format.format(dateCame_var);
        String Date_Went = Date_Format.format(dateWent_var);
        
        // - - - - -- - -
        java.util.Date today = new java.util.Date();
        java.util.Date dateIn=new SimpleDateFormat("yyyy-MM-dd").parse(dateCame);
        java.util.Date dateOut=new SimpleDateFormat("yyyy-MM-dd").parse(Date_Went);
        
        // - - - - -- - -
        
                if(!(dateIn.after(today) || dateIn.after(today)))
                {
                    
                    showMessageDialog(null, "The date in should be after or equal to today ", "ERROR", ERROR_MESSAGE);
                } 
                else if(dateOut.before(dateIn)) 
                {
                    showMessageDialog(null, "The date out should be after or equal to the day of arrival ", "ERROR", ERROR_MESSAGE);
                }else
                {
                    String Type_of_Cancellation = type_of_cancellation_textBox1.getText();
                   // showMessageDialog(null, Type_of_Cancellation.length(), "Successful", INFORMATION_MESSAGE);
                    if(Type_of_Cancellation.length()==0)
                    {
                        if(reserv_class_obj1.editingSelectedReservation(reserID, guestID, rNumber, dateCame, Date_Went, ""))
                            {
                                showMessageDialog(null, "You have updated it successfully! ", "Successful", INFORMATION_MESSAGE);
                                refresh_table();
                            }
                        else
                            {
                                showMessageDialog(null, "You have NOT updated it successfully! ", "ERROR", ERROR_MESSAGE);
                            }
                    }else //когато полето за прекъсната резервация е попълнено
                    {
                        if(reserv_class_obj1.editingSelectedReservation(reserID, guestID, rNumber, dateCame, Date_Went, Type_of_Cancellation))
                            {
                                showMessageDialog(null, "You have updated it successfully! ", "Successful", INFORMATION_MESSAGE);
                                refresh_table();
                                
                                substractingGuestRating_DB(guestID, dateCame, Date_Went, rNumber);
                            }
                        else
                            {
                                showMessageDialog(null, "You have NOT updated it successfully! ", "ERROR", ERROR_MESSAGE);
                            }
                    }
                    
                }

        // -- - - - - - -- - - -- - - -- - 
            
               
    }catch(NumberFormatException e)
        {
            showMessageDialog(null, e.getMessage(), "ERROR", ERROR_MESSAGE);
        } catch (ParseException ex) {
            Logger.getLogger(reservationsForm.class.getName()).log(Level.SEVERE, null, ex);
        }  
    
    }//GEN-LAST:event_btn1_reservation_editActionPerformed

    private void btn1_guests_removeActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn1_guests_removeActionPerformed
        
        int reservationId = Integer.valueOf(textBox1_Reservation_ID.getText());
        if(reserv_class_obj1.delReservation(reservationId))
            {
                showMessageDialog(null, "You have deleted it successfully! ", "Successful", INFORMATION_MESSAGE);
                refresh_table();
            }else
            {
                showMessageDialog(null, "You have NOT deleted it successfully! ", "Error", ERROR_MESSAGE);
            }
    }//GEN-LAST:event_btn1_guests_removeActionPerformed

    // Refresh table method
    private void refresh_table(){                                                   
       jTable1.setModel(new DefaultTableModel(null, new Object[]{"Reservation ID", "Guest ID", "Room Number", "Date_Came", "Date_went", "Cancelled Reserv."})); 
        
       reserv_class_obj1.addingReservationsIntoTable(jTable1);
    } 
    
    private void btn1_guests_clearActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn1_guests_clearActionPerformed
        textBox1_Reservation_ID.setText("");
        textBox1_Guest_ID.setText("");
        textBox1_Room_Number.setText("");
        
        //ресетване на датите (null) в двата dateChooser-a :
        Date date = new Date();
        dateChooser_Date_Came.setDate(date);
        dateChooser_Date_Went.setDate(date);
    }//GEN-LAST:event_btn1_guests_clearActionPerformed

    
    // Refresh button
    private void btn1_guests_clear1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn1_guests_clear1ActionPerformed
       jTable1.setModel(new DefaultTableModel(null, new Object[]{"Reservation ID", "Guest ID", "Room Number", "Date_Came", "Date_went", "Cancelled Reserv."})); 
        
       reserv_class_obj1.addingReservationsIntoTable(jTable1);
    }//GEN-LAST:event_btn1_guests_clear1ActionPerformed

    private void textBox1_Guest_IDActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_textBox1_Guest_IDActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_textBox1_Guest_IDActionPerformed
 
    private void textBox1_Room_NumberActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_textBox1_Room_NumberActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_textBox1_Room_NumberActionPerformed

    private void most_recent_reservations_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_most_recent_reservations_btn1ActionPerformed
        reserv_class_obj1.adding_RECENT_ReservationsIntoTable(jTable1);
    }//GEN-LAST:event_most_recent_reservations_btn1ActionPerformed

    private void show_all_reservations_btn2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_show_all_reservations_btn2ActionPerformed
        refresh_table();
    }//GEN-LAST:event_show_all_reservations_btn2ActionPerformed

    private void extra_services_btn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_extra_services_btn1ActionPerformed
        
        if(textBox1_Reservation_ID.getText().equals("") || textBox1_Guest_ID.getText().equals(""))
        {
            showMessageDialog(null, "Please select a reservation! ", "Error", ERROR_MESSAGE);
        }else
        {
            extra_Services_Form resF1 = new extra_Services_Form();
            resF1.setVisible(true);
                resF1.setThings(textBox1_Reservation_ID.getText(), textBox1_Guest_ID.getText());
                resF1.checkingTheReservationIn_DB();
            resF1.pack();
            resF1.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        }
    }//GEN-LAST:event_extra_services_btn1ActionPerformed
  
    
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
            java.util.logging.Logger.getLogger(reservationsForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(reservationsForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(reservationsForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(reservationsForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new reservationsForm().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel SuccessOrNot_label1;
    private javax.swing.JButton btn1_guests_clear;
    private javax.swing.JButton btn1_guests_clear1;
    private javax.swing.JButton btn1_guests_remove;
    private javax.swing.JButton btn1_reservation_creation;
    private javax.swing.JButton btn1_reservation_edit;
    private com.toedter.calendar.JDateChooser dateChooser_Date_Came;
    private com.toedter.calendar.JDateChooser dateChooser_Date_Went;
    private javax.swing.JButton extra_services_btn1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jTable1;
    private javax.swing.JButton most_recent_reservations_btn1;
    private javax.swing.JButton show_all_reservations_btn2;
    private javax.swing.JTextField textBox1_Guest_ID;
    private javax.swing.JTextField textBox1_Reservation_ID;
    private javax.swing.JTextField textBox1_Room_Number;
    private javax.swing.JTextField type_of_cancellation_textBox1;
    // End of variables declaration//GEN-END:variables
}
