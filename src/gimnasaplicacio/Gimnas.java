/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gimnasaplicacio;

import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;
import java.text.ParseException;
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
    
    Conexio_bd con = new Conexio_bd();
    Client cl = new Client();
    public void gestionarGimnas() throws SQLException, ParseException, IOException{
        do{
            System.out.println("**********MENU GIMNAS*********");
        
            System.out.println("1. Gestio client");
            System.out.println("2. Llistar Clients");
            System.out.println("3. Activitats del Dia");
            System.out.println("4. Desconectar de BD");
            System.out.println("s. Sortir");
            
            String sa = st.next();
            char opcio = sa.charAt(0);  
            System.out.print("Ha premut l'opcio: ");
            switch (opcio){
                case '1':
                    System.out.println(" Gestionar el Client ");
                    cl.Gestio_clients();
                    break;
                 case '2':
                    System.out.println(" Llistar els Clients ");
                    cl.Llistar_Client();
                    break;
                 case '3':
                     System.out.println(" Activitats Del Dia");
                    cl.actDia();
                    break;
                case '4':
                    con.desconnexioBD();
                    break;
                case 'S':
                    System.out.println(" Tancar Aplicació");
                   enrere=true;
                   break;
                default:
                   System.out.println("L'Opció no és vàlida");
            }
        } 
        while (!enrere);
                  
    }
    
    
 }

