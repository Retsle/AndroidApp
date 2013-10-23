package com.se_3;

//import android.os.Bundle;
import android.app.Activity;
//import android.view.Menu;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class Connection_to_DB extends Activity {

	private String Username = "root";
	private String Password = "Passwort";
	private String Driver = "com.mysql.jdbc.Driver";
	private String URL = "jdbc:mysql://mysql.host.net:3306/datenbank";
	private Connection connection;

	public Connection_to_DB() {
		this.Connect();
	}

	/*
	 * Sollte der Konstruktur ohne argumente aufgerufen werden, werden die in
	 * der klasse genutzten Werte genommen.
	 */

	public Connection_to_DB(String user, String pass) {
		this.Username = user;
		this.Password = pass;
		this.Connect();
	}

	/*
	 * Sollte der Konstruktur mit den Argumenten user und pass aufgerufen
	 * werden, werden diese definiert und dann Verbunden.
	 */

	public void Close() {
		if (this.connection != null) {
			try {
				this.connection.close();
			} catch (Exception e) {
			}
		}
	}

	/*
	 * Die Funktion Close() schlie�t das Query um den Speicher wieder frei zu
	 * geben
	 */

	public void Connect() {
		try {
			Class.forName(this.Driver);
			this.connection = DriverManager.getConnection(this.URL,
					this.Username, this.Password);
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println("Error Connecting with User:" + Username
					+ " and Password:" + Password);
		}
	}

	/*
	 * Connect registriert den JDBC Treiber und versucht eine Verbindung
	 * herzustellen. Sollte dies nicht m�glich sein, wird eine Exception
	 * ausgel�st
	 */

	public boolean isConnected() {
		try {
			ResultSet rs = this.ReturnQuery("SELECT 1;");
			if (rs == null) {
				return false;
			}
			if (rs.next()) {
				return true;
			}
			return false;
		} catch (Exception e) {
			return false;
		}
	}

	/*
	 * fr�gt ein einfaches Query ab, welches "1" zur�ck liefert, falls man
	 * verbunden ist
	 */

	public ResultSet ReturnQuery(String query) {
		try {
			Statement stmt = this.connection.createStatement();
			ResultSet rs = stmt.executeQuery(query);
			return rs;
		} catch (SQLException e) {
			System.err.println(e.toString());
			return null;
		}
	}

	/* Sendet ein Query und erwartet eine R�ckgabe in Form eines ResultSet */

	public boolean RunQuery(String query) {
		try {
			Statement stmt = this.connection.createStatement();
			return stmt.execute(query);
		} catch (Exception e) {
			// e.printStackTrace();
			return false;
		}
	}
	/* F�hrt das query aus, erwartet aber keine R�ckantwort des Servers. */
}