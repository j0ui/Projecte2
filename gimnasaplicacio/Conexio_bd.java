/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gimnasaplicacio;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author DAM
 */
public class Conexio_bd {

    public Connection connectarBD() throws SQLException {
            //Connexió a la base de dades

        Connection conn = null;   
            try{
                Class.forName("com.mysql.cj.jdbc.Driver");
                conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/projecte","root", "");
                
            }
            catch (ClassNotFoundException | SQLException e) {
                System.out.println(e.getMessage());

            }
            return conn;
        }
    
    
    public void desconnexioBD() throws SQLException {
        System.out.println("Desconnectat de la BD");
        
    }
}
