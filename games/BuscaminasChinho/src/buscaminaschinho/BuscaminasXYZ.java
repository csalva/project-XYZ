/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package buscaminaschinho;

import java.applet.Applet;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.GridLayout;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.IOException;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;

class GameFacil extends JFrame implements ActionListener {

    private JPanel central;
    private Dimension dim = Toolkit.getDefaultToolkit().getScreenSize();
    private int fila = 9;
    private int columna = 9;
    private int mina = 10;
    private javax.swing.JButton Tablero[][] = new JButton[columna][fila];
    private boolean visible[][] = new boolean[columna][fila];
    private String valor[][] = new String[columna][fila];
    private boolean perder = false;
    private int victoria = 0;
    private int victoriafinal = fila * columna - mina;
    private static int dificultad = 9;
    

    GameFacil() {

        this.setSize(dim.width, dim.height);

        int i = 0;
        int j = 0;

        central = new JPanel(new GridLayout(columna, fila));
        while (i < columna) {
            while (j < fila) {
                Tablero[i][j] = new javax.swing.JButton();
                Tablero[i][j].addActionListener(this);
                central.add(Tablero[i][j]);
                j++;
            }
            i++;
            j = 0;
        }
        i = 0;
        add(central);

    }

    public void colocarminasynumeros() throws IOException {
        sendWin();
        
        int i = 0;
        int j = 0;
        int k = 0;

        while (i < columna) {
            while (j < fila) {
                valor[i][j] = "-";
                visible[i][j] = false;
                j++;
            }
            i++;
            j = 0;
        }
        i = 0;
        while (k < mina) {
            i = (int) (Math.random() * columna);
            j = (int) (Math.random() * fila);
            if (valor[i][j] == "-") {
                k++;
                valor[i][j] = "M";
            }
        }
        k = 0;
        i = 0;
        j = 0;
        i = 0;

        while (i < columna) {
            while (j < fila) {
                System.out.print(" " + valor[i][j] + " ");

                j++;
            }
            i++;
            j = 0;
            System.out.println();
        }
        i = 0;



        while (i < columna) {
            while (j < fila) {
                /*mirar izquierda*/
                if (j != 0 && !valor[i][j].equals("M")) {
                    if (valor[i][j - 1] == "M") {
                        k++;
                    }
                }
                /*mirar derecha*/
                if (j != (fila - 1) && !valor[i][j].equals("M")) {
                    if (valor[i][j + 1] == "M") {
                        k++;
                    }
                }
                /*mirar arriba*/
                if (i != 0 && !valor[i][j].equals("M")) {
                    if (valor[i - 1][j] == "M") {
                        k++;
                    }
                }
                /*mirar abajo*/
                if (i != (columna - 1) && !valor[i][j].equals("M")) {
                    if (valor[i + 1][j] == "M") {
                        k++;
                    }
                }
                /*mirar arribaizq*/
                if (i != 0 && j != 0 && !valor[i][j].equals("M")) {
                    if (valor[i - 1][j - 1] == "M") {
                        k++;
                    }
                }
                /*mirar arribader*/
                if (i != 0 && j != (fila - 1) && !valor[i][j].equals("M")) {
                    if (valor[i - 1][j + 1] == "M") {
                        k++;
                    }
                }

                /*mirar abajoizq*/
                if (i != (columna - 1) && j != 0 && !valor[i][j].equals("M")) {
                    if (valor[i + 1][j - 1] == "M") {
                        k++;
                    }
                }

                /* mirar abajoder*/
                if (i != (columna - 1) && j != (fila - 1) && !valor[i][j].equals("M")) {
                    if (valor[i + 1][j + 1] == "M") {
                        k++;
                    }
                }
                if (!valor[i][j].equals("M")) {
                    valor[i][j] = "" + k;
                }
                j++;
                k = 0;
            }
            i++;
            j = 0;

        }
        i = 0;

        while (i < columna) {
            while (j < fila) {
                System.out.print(" " + valor[i][j] + " ");

                j++;
            }
            i++;
            j = 0;
            System.out.println();
        }
        i = 0;

    }

    public void sendWin () throws IOException{
        HttpURLConnection connection = null;
        try {
            URL url = new URL("http://localhost/project-xyz/insert_data_score.php?id_user=2&id_game=1&score=55");
            connection = (HttpURLConnection) url.openConnection();
            connection.connect();
            connection.getInputStream();
                        // do something with the input stream here

        } catch (MalformedURLException e1) {
            e1.printStackTrace();
        } catch (IOException e1) {
            e1.printStackTrace();
        } finally {
            if(null != connection) { connection.disconnect(); }
        }
    }
    
    public void actionPerformed(ActionEvent e) {
        int i = 0;
        int j = 0;
        if (victoria < victoriafinal && perder == false) {
            while (i < columna) {
                while (j < fila) {
                    if (e.getSource() == Tablero[i][j]) {
                        if (visible[i][j] == false) {
                            Tablero[i][j].setText(valor[i][j]);
                            visible[i][j] = true;
                            if (Tablero[i][j].getText().equals("M")) {
                                perder = true;
                                JOptionPane.showMessageDialog(central, "Has Perdido");
                            }
                            if (!Tablero[i][j].getText().equals("M")) {
                                victoria++;

                            }
                        }
                    }
                    j++;
                }
                i++;
                j = 0;
            }
            i = 0;
            if (victoria == victoriafinal) {
                JOptionPane.showMessageDialog(central, "Has Ganado");
                try {
                    sendWin();
                } catch (IOException ex) {
                    Logger.getLogger(GameFacil.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        }
    }
}

class GameMedia extends JFrame implements ActionListener {

    private JPanel central;
    private Dimension dim = Toolkit.getDefaultToolkit().getScreenSize();
    private int fila = 16;
    private int columna = 16;
    private int mina = 40;
    private javax.swing.JButton Tablero[][] = new JButton[columna][fila];
    private boolean visible[][] = new boolean[columna][fila];
    private String valor[][] = new String[columna][fila];
    private boolean perder = false;
    private int victoria = 0;
    private int victoriafinal = fila * columna - mina;
    private static int dificultad = 10;

    GameMedia() {

        this.setSize(dim.width, dim.height);

        int i = 0;
        int j = 0;

        central = new JPanel(new GridLayout(columna, fila));
        while (i < columna) {
            while (j < fila) {
                Tablero[i][j] = new javax.swing.JButton();
                Tablero[i][j].addActionListener(this);
                central.add(Tablero[i][j]);
                j++;
            }
            i++;
            j = 0;
        }
        i = 0;
        add(central);

    }

    public void colocarminasynumeros() {
        int i = 0;
        int j = 0;
        int k = 0;

        while (i < columna) {
            while (j < fila) {
                valor[i][j] = "-";
                visible[i][j] = false;
                j++;
            }
            i++;
            j = 0;
        }
        i = 0;
        while (k < mina) {
            i = (int) (Math.random() * columna);
            j = (int) (Math.random() * fila);
            if (valor[i][j] == "-") {
                k++;
                valor[i][j] = "M";
            }
        }
        k = 0;
        i = 0;
        j = 0;
        i = 0;

        while (i < columna) {
            while (j < fila) {
                System.out.print(" " + valor[i][j] + " ");

                j++;
            }
            i++;
            j = 0;
            System.out.println();
        }
        i = 0;



        while (i < columna) {
            while (j < fila) {
                /*mirar izquierda*/
                if (j != 0 && !valor[i][j].equals("M")) {
                    if (valor[i][j - 1] == "M") {
                        k++;
                    }
                }
                /*mirar derecha*/
                if (j != (fila - 1) && !valor[i][j].equals("M")) {
                    if (valor[i][j + 1] == "M") {
                        k++;
                    }
                }
                /*mirar arriba*/
                if (i != 0 && !valor[i][j].equals("M")) {
                    if (valor[i - 1][j] == "M") {
                        k++;
                    }
                }
                /*mirar abajo*/
                if (i != (columna - 1) && !valor[i][j].equals("M")) {
                    if (valor[i + 1][j] == "M") {
                        k++;
                    }
                }
                /*mirar arribaizq*/
                if (i != 0 && j != 0 && !valor[i][j].equals("M")) {
                    if (valor[i - 1][j - 1] == "M") {
                        k++;
                    }
                }
                /*mirar arribader*/
                if (i != 0 && j != (fila - 1) && !valor[i][j].equals("M")) {
                    if (valor[i - 1][j + 1] == "M") {
                        k++;
                    }
                }

                /*mirar abajoizq*/
                if (i != (columna - 1) && j != 0 && !valor[i][j].equals("M")) {
                    if (valor[i + 1][j - 1] == "M") {
                        k++;
                    }
                }

                /* mirar abajoder*/
                if (i != (columna - 1) && j != (fila - 1) && !valor[i][j].equals("M")) {
                    if (valor[i + 1][j + 1] == "M") {
                        k++;
                    }
                }
                if (!valor[i][j].equals("M")) {
                    valor[i][j] = "" + k;
                }
                j++;
                k = 0;
            }
            i++;
            j = 0;

        }
        i = 0;

        while (i < columna) {
            while (j < fila) {
                System.out.print(" " + valor[i][j] + " ");

                j++;
            }
            i++;
            j = 0;
            System.out.println();
        }
        i = 0;

    }

    public void actionPerformed(ActionEvent e) {
        int i = 0;
        int j = 0;
        if (victoria < victoriafinal && perder == false) {
            while (i < columna) {
                while (j < fila) {
                    if (e.getSource() == Tablero[i][j]) {
                        if (visible[i][j] == false) {
                            Tablero[i][j].setText(valor[i][j]);
                            visible[i][j] = true;
                            if (Tablero[i][j].getText().equals("M")) {
                                perder = true;
                                JOptionPane.showMessageDialog(central, "Has Perdido");
                            }
                            if (!Tablero[i][j].getText().equals("M")) {
                                victoria++;

                            }
                        }
                    }
                    j++;
                }
                i++;
                j = 0;
            }
            i = 0;
            if (victoria == victoriafinal) {
                JOptionPane.showMessageDialog(central, "Has Ganado");

            }
        }
    }
}

class GameDificil extends JFrame implements ActionListener {

    private JPanel central;
    private Dimension dim = Toolkit.getDefaultToolkit().getScreenSize();
    private int fila = 30;
    private int columna = 16;
    private int mina = 99;
    private javax.swing.JButton Tablero[][] = new JButton[columna][fila];
    private boolean visible[][] = new boolean[columna][fila];
    private String valor[][] = new String[columna][fila];
    private boolean perder = false;
    private int victoria = 0;
    private int victoriafinal = fila * columna - mina;
    private static int dificultad = 11;

    GameDificil() {

        this.setSize(dim.width, dim.height);

        int i = 0;
        int j = 0;

        central = new JPanel(new GridLayout(columna, fila));
        while (i < columna) {
            while (j < fila) {
                Tablero[i][j] = new javax.swing.JButton();
                Tablero[i][j].addActionListener(this);
                central.add(Tablero[i][j]);
                j++;
            }
            i++;
            j = 0;
        }
        i = 0;
        add(central);

    }

    public void colocarminasynumeros() {
        int i = 0;
        int j = 0;
        int k = 0;

        while (i < columna) {
            while (j < fila) {
                valor[i][j] = "-";
                visible[i][j] = false;
                j++;
            }
            i++;
            j = 0;
        }
        i = 0;
        while (k < mina) {
            i = (int) (Math.random() * columna);
            j = (int) (Math.random() * fila);
            if (valor[i][j] == "-") {
                k++;
                valor[i][j] = "M";
            }
        }
        k = 0;
        i = 0;
        j = 0;
        i = 0;

        while (i < columna) {
            while (j < fila) {
                System.out.print(" " + valor[i][j] + " ");

                j++;
            }
            i++;
            j = 0;
            System.out.println();
        }
        i = 0;



        while (i < columna) {
            while (j < fila) {
                /*mirar izquierda*/
                if (j != 0 && !valor[i][j].equals("M")) {
                    if (valor[i][j - 1] == "M") {
                        k++;
                    }
                }
                /*mirar derecha*/
                if (j != (fila - 1) && !valor[i][j].equals("M")) {
                    if (valor[i][j + 1] == "M") {
                        k++;
                    }
                }
                /*mirar arriba*/
                if (i != 0 && !valor[i][j].equals("M")) {
                    if (valor[i - 1][j] == "M") {
                        k++;
                    }
                }
                /*mirar abajo*/
                if (i != (columna - 1) && !valor[i][j].equals("M")) {
                    if (valor[i + 1][j] == "M") {
                        k++;
                    }
                }
                /*mirar arribaizq*/
                if (i != 0 && j != 0 && !valor[i][j].equals("M")) {
                    if (valor[i - 1][j - 1] == "M") {
                        k++;
                    }
                }
                /*mirar arribader*/
                if (i != 0 && j != (fila - 1) && !valor[i][j].equals("M")) {
                    if (valor[i - 1][j + 1] == "M") {
                        k++;
                    }
                }

                /*mirar abajoizq*/
                if (i != (columna - 1) && j != 0 && !valor[i][j].equals("M")) {
                    if (valor[i + 1][j - 1] == "M") {
                        k++;
                    }
                }

                /* mirar abajoder*/
                if (i != (columna - 1) && j != (fila - 1) && !valor[i][j].equals("M")) {
                    if (valor[i + 1][j + 1] == "M") {
                        k++;
                    }
                }
                if (!valor[i][j].equals("M")) {
                    valor[i][j] = "" + k;
                }
                j++;
                k = 0;
            }
            i++;
            j = 0;

        }
        i = 0;

        while (i < columna) {
            while (j < fila) {
                System.out.print(" " + valor[i][j] + " ");

                j++;
            }
            i++;
            j = 0;
            System.out.println();
        }
        i = 0;

    }

    public void actionPerformed(ActionEvent e) {
        int i = 0;
        int j = 0;
        if (victoria < victoriafinal && perder == false) {
            while (i < columna) {
                while (j < fila) {
                    if (e.getSource() == Tablero[i][j]) {
                        if (visible[i][j] == false) {
                            Tablero[i][j].setText(valor[i][j]);
                            visible[i][j] = true;
                            if (Tablero[i][j].getText().equals("M")) {
                                perder = true;
                                JOptionPane.showMessageDialog(central, "Has Perdido");
                            }
                            if (!Tablero[i][j].getText().equals("M")) {
                                victoria++;

                            }
                        }
                    }
                    j++;
                }
                i++;
                j = 0;
            }
            i = 0;
            if (victoria == victoriafinal) {
                JOptionPane.showMessageDialog(central, "Has Ganado");

            }
        }
    }
}

public class BuscaminasXYZ extends Applet implements ActionListener {


    StringBuffer buffer;

    public void init() {
        buffer = new StringBuffer();
    }


    public void stop() {
    }

    public void destroy() {
    }

    private javax.swing.JLabel dificultat = new javax.swing.JLabel("Escoje la dificultat del juego", JLabel.CENTER);
    private javax.swing.JButton Facil = new JButton("Facil");
    private javax.swing.JButton Media = new JButton("Media");
    private javax.swing.JButton Dificil = new JButton("Dificil");
    private javax.swing.JPanel panelmenu = new JPanel(new GridLayout(4, 1));
    Dimension dim = Toolkit.getDefaultToolkit().getScreenSize();
    
    int w;
    int h;
    int x;
    int y;
    int columnas;
    int filas;
    int minas;

    public void start() {

        this.setSize(400, 150);
        w = this.getSize().width;
        h = this.getSize().height;
        x = (dim.width - w) / 2;
        y = (dim.height - h) / 2;
        this.setLocation(x, y);
        panelmenu.add(dificultat);
        Facil.addActionListener(this);
        Media.addActionListener(this);
        Dificil.addActionListener(this);
        panelmenu.add(Facil);
        panelmenu.add(Media);
        panelmenu.add(Dificil);
        add(panelmenu);
    }

    public static void main(String[] args) {
        BuscaminasXYZ menu = new BuscaminasXYZ();
        menu.setVisible(true);



    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == Facil) {

            GameFacil game = new GameFacil();
            try {
                game.colocarminasynumeros();
            } catch (IOException ex) {
                Logger.getLogger(BuscaminasXYZ.class.getName()).log(Level.SEVERE, null, ex);
            }
            game.setVisible(true);

        }
        if (e.getSource() == Media) {
            GameMedia game = new GameMedia();
            game.colocarminasynumeros();
            game.setVisible(true);



        }
        if (e.getSource() == Dificil) {
            GameDificil game = new GameDificil();
            game.colocarminasynumeros();
            game.setVisible(true);



        }
    }
}
