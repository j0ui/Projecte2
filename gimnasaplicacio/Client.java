/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gimnasaplicacio;

import java.sql.*;
import java.util.ArrayList;
import java.util.Scanner;
/**
 *
 * @author DAM
 */
public class Client {
    private String DNI;
    private String nom;
    private String cognom;
    private String telefon;
    private String email;
    private String CCC;
    private int edat;
    private String domicili;
    Scanner teclat = new Scanner (System.in);
    Scanner st = new Scanner(System.in);
     private boolean enrere=false;

    public Client() {
    }

    public Client(String DNI, String nom, String cognom, String telefon, String email, String CCC, int edat, String domicili) {
        this.DNI = DNI;
        this.nom = nom;
        this.cognom = cognom;
        this.telefon = telefon;
        this.email = email;
        this.CCC = CCC;
        this.edat = edat;
        this.domicili = domicili;
    }

    public String getDNI() {
        return DNI;
    }

    public void setDNI(String DNI) {
        this.DNI = teclat.nextLine();
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getCognom() {
        return cognom;
    }

    public void setCognom(String cognom) {
        this.cognom = cognom;
    }

    public String getTelefon() {
        return telefon;
    }

    public void setTelefon(String telefon) {
        this.telefon = telefon;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getCCC() {
        return CCC;
    }

    public void setCCC(String CCC) {
        this.CCC = CCC;
    }

    public int getEdat() {
        return edat;
    }

    public void setEdat(int edat) {
        this.edat = teclat.nextInt();
    }

    public String getDomicili() {
        return domicili;
    }

    public void setDomicili(String domicili) {
        this.domicili = domicili;
    }
    
    
    
    
    public void Gestio_clients(){
        do{
            System.out.println("**********MENU GIMNAS*********");
        
            System.out.println("1. Afegir Client");
            System.out.println("2. Modificar Client");
            System.out.println("3. Esborrar Client");
            System.out.println("S. Sortir");

            String sa = st.next();
            char opcio = sa.charAt(0);  
            


           switch (opcio){
                case '1':
                    Afegir_clients();
                    break;
                case '2':
                    Modificar_client();
                    break;
                case '3':
                    Esborrar_client();
                    break;
                case 'S':
                enrere = true;
                   break;

                default:
                   System.out.println("L'Opció no és vàlida");
            }
        } 
        while (!enrere);

    }
    public boolean Afegir_clients(){
        try{
            Connection con = new Conexio_bd().connectarBD();
            PreparedStatement sql = con.prepareStatement("insert into proveidor "
                    + "(Edat, DNI) "
                    + "values "
                    + "(?, ?);");
            edat = teclat.nextInt();
            teclat.nextLine();
            DNI = teclat.nextLine();
            sql.setInt(1, this.edat);
            sql.setString(2, this.DNI);
            int res = sql.executeUpdate();
            if(res==1){
                return true;
            }else{
                return false;
            }
        } catch (SQLException e){
            e.printStackTrace();
            return false;
        }
    }
    
    public boolean Modificar_client(){
        try{
            Connection con = new Conexio_bd().connectarBD();
            System.out.println("Modificar client amb el DNI: ");
            edat = teclat.nextInt();
            PreparedStatement sql = con.prepareStatement("select * from proveidor where Edat=" + edat + ";");
            ResultSet rs = sql.executeQuery();
            while (rs.next()) {
                        edat = rs.getInt("Edat");
                        DNI = rs.getString("DNI");
                        System.out.println("Edat: "+ edat + " DNI: "+ DNI);
            }
        } catch (SQLException e){
            e.printStackTrace();
            return false;
        }return false;
    }
    
    public void Esborrar_client(){
        
    }

    
    
    public boolean Llistar_clients(){
       try{
            Connection con = new Conexio_bd().connectarBD();
            PreparedStatement sql = con.prepareStatement("select * from proveidor;");
            ResultSet rs = sql.executeQuery();
            
            while (rs.next()) {
                System.out.println("Edat:" + rs.getInt("Edat")+ " DNI: "+ rs.getString("DNI"));

            }
            
        } catch (SQLException e){
            e.printStackTrace();
            return false;
        }return false;
    }
    
    
}
