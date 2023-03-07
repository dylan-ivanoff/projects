
package java_project_hotel_uni;

import com.mysql.cj.jdbc.MysqlDataSource;
import java.sql.Connection;
//import com.mysql.jdbc.jdbc2.optional.MysqlDataSource;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class my_SQL_Connect_Class {
    
    public Connection devConnect()
    {
        
            Connection con = null;
            MysqlDataSource msds = new MysqlDataSource();
            msds.setServerName("localhost");
            msds.setPortNumber(3306);
            msds.setUser("root");
            msds.setPassword("");
            msds.setDatabaseName("java_project_hotel_uni_database");
        try{
            con = msds.getConnection();            
        } catch (SQLException ex) {
            Logger.getLogger(my_SQL_Connect_Class.class.getName()).log(Level.SEVERE, null, ex);
        }
        return con;
    }
}
