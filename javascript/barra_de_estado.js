<!-- Hide from old browsers

  message     = "Bienvenidos al Sistema Chasqui Digital^" +							
				"Control y Seguimiento de Correspondencia^" +
                "Universidad Mayor de San Andrés^" +
				"Decanato de Ciencias Puras y Naturales^" +
                "Correo Electrónico dec_fcpn@yahoo.es^" +
                "Horario de Atencion: de 8:45 a 12:00^" +
				"y 14:30 a 18:30 Lunes/Viernes^" +
                "^"
  scrollSpeed = 75
  lineDelay   = 1500

  txt         = ""

  function scrollText(pos) {
    if (message.charAt(pos) != '^') {
      txt    = txt + message.charAt(pos)
      status = txt
      pauze  = scrollSpeed
    }
    else {
      pauze = lineDelay
      txt   = ""
      if (pos == message.length-1) pos = -1
    }
    pos++
    setTimeout("scrollText('"+pos+"')",pauze)
  }

  // Unhide -->
scrollText(0)