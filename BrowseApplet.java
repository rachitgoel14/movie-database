import javax.swing.*;

import java.applet.Applet;
import java.awt.event.*;
import java.awt.*;
import java.util.*;


public class BrowseApplet extends Applet implements ActionListener {

	//private static final long serialVersionUID = 1L;
Button button; 
JFileChooser chooser;
//String choosertitle;
public String result;

  public void init() 
 {
	button = new Button("Browse");
    button.addActionListener(this);
    add(button);

  }  

public void actionPerformed(ActionEvent e) {


chooser = new JFileChooser(); 
chooser.setCurrentDirectory(new java.io.File("."));
//chooser.setDialogTitle(choosertitle);
chooser.setFileSelectionMode(JFileChooser.DIRECTORIES_ONLY);
chooser.setAcceptAllFileFilterUsed(false);
  if (chooser.showOpenDialog(this) == JFileChooser.APPROVE_OPTION) 
  { 
      result=chooser.getSelectedFile().toString();
    //  System.out.println("getCurrentDirectory(): " + chooser.getCurrentDirectory());
    //  System.out.println("getSelectedFile() : " + chooser.getSelectedFile());
  }
else 
   {
      //System.out.println("No Selection file");
   }
 }



}