/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gimnasaplicacio;

import java.sql.SQLException;
import java.util.Scanner;

/**
 *
 * @author DAM
 */
public class GimnasAplicacio {
    Scanner teclat = new Scanner (System.in);
    Scanner st = new Scanner(System.in);
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws SQLException {
        // TODO code application logic here
        Conexio_bd c = new Conexio_bd();
        Gimnas g = new Gimnas();
        System.out.println(g);
        c.connectarBD();
        g.gestionarGimnas();
    }
    
}
