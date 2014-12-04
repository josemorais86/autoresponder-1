autoresponder
=============

Wasanga Autoresponder

SQL
--
-- Estructura de tabla para la tabla `r_campo`
--

CREATE TABLE IF NOT EXISTS `r_campo` (
  `id_campo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL COMMENT 'nombre unico en mayuscula',
  PRIMARY KEY (`id_campo`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_form`
--

CREATE TABLE IF NOT EXISTS `r_form` (
  `id_form` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `ref` varchar(45) DEFAULT NULL,
  `titulo` varchar(50) NOT NULL,
  `boton` varchar(50) NOT NULL,
  `url_return` varchar(200) NOT NULL,
  `r_lista_id_lista` int(11) NOT NULL,
  PRIMARY KEY (`id_form`),
  KEY `fk_r_form_r_lista1` (`r_lista_id_lista`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_form_has_r_campo`
--

CREATE TABLE IF NOT EXISTS `r_form_has_r_campo` (
  `r_form_id_form` int(11) NOT NULL,
  `r_campo_id_campo` int(11) NOT NULL,
  `orden` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`r_form_id_form`,`r_campo_id_campo`),
  KEY `fk_r_form_has_r_campo_r_campo1` (`r_campo_id_campo`),
  KEY `fk_r_form_has_r_campo_r_form1` (`r_form_id_form`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_lista`
--

CREATE TABLE IF NOT EXISTS `r_lista` (
  `id_lista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `nombre_creador` varchar(100) NOT NULL,
  `email_creador` varchar(100) NOT NULL,
  `reply_to` varchar(100) NOT NULL,
  `fk_ws_registro` int(11) NOT NULL,
  PRIMARY KEY (`id_lista`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_macro`
--

CREATE TABLE IF NOT EXISTS `r_macro` (
  `id_macro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `accion` tinyint(1) DEFAULT NULL COMMENT '1=agregar\n0=eliminar',
  `target` int(11) DEFAULT NULL COMMENT 'lista',
  `r_lista_id_lista` int(11) NOT NULL,
  PRIMARY KEY (`id_macro`),
  KEY `fk_r_macro_r_lista1` (`r_lista_id_lista`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_mail`
--

CREATE TABLE IF NOT EXISTS `r_mail` (
  `id_mail` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `asunto` varchar(200) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '0' COMMENT '1=activo0=inactivo',
  `html` text,
  `texto` text,
  `remitente` varchar(250) NOT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL COMMENT '1=seguimiento\n0=boletin',
  `r_lista_id_lista` int(11) NOT NULL,
  PRIMARY KEY (`id_mail`),
  KEY `fk_r_mail_r_lista1` (`r_lista_id_lista`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_suscriptor`
--

CREATE TABLE IF NOT EXISTS `r_suscriptor` (
  `id_suscriptor` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `registered` datetime DEFAULT NULL,
  `fk_registro_id` int(11) NOT NULL COMMENT 'id de dueño del suscriptor',
  `r_lista_id_lista` int(11) NOT NULL,
  `fk_ws_registro` int(11) DEFAULT NULL,
  `fk_ws_prospecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_suscriptor`),
  KEY `fk_r_suscriptor_r_lista1` (`r_lista_id_lista`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=494 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_suscriptor_has_r_campo`
--

CREATE TABLE IF NOT EXISTS `r_suscriptor_has_r_campo` (
  `r_suscriptor_id_suscriptor` int(11) NOT NULL,
  `r_campo_id_campo` int(11) NOT NULL,
  `valor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`r_suscriptor_id_suscriptor`,`r_campo_id_campo`),
  KEY `fk_r_suscriptor_has_r_campo_r_campo1` (`r_campo_id_campo`),
  KEY `fk_r_suscriptor_has_r_campo_r_suscriptor1` (`r_suscriptor_id_suscriptor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
