/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gimnasaplicacio;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author DAM
 */
public class Gimnas {
    private String nom;
    private String CIF;
    private String telefon;
    private boolean enrere=false;
    ArrayList<Client> clients;
    Scanner teclat = new Scanner (System.in);
    Scanner st = new Scanner(System.in);
    Client cl = new Client();
    public void gestionarGimnas() throws SQLException{
        do{
            System.out.println("**********MENU GIMNAS*********");
        
            System.out.println("1. Gestio client");
            System.out.println("2. Llistar Clients");
            System.out.println("S. Sortir");

            String sa = st.next();
            char opcio = sa.charAt(0);  
            


           switch (opcio){
                case '1':
                    cl.Gestio_clients();
                    break;
                 case '2':
                    cl.Llistar_clients();
                    break;
                case 'S':
                   enrere=true;
                   break;
                default:
                   System.out.println("L'Opció no és vàlida");
            }
        } 
        while (!enrere);
                  
    }
    
    
 }

