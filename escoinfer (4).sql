-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2022 a las 16:47:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escoinfer`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarPedidos` (`idPedido` INT, `id_transaccion` INT, `Valor` INT, `estado` BOOLEAN, `fechaPedido` DATE, `email` VARCHAR(30), `nombre` VARCHAR(30), `apellido` VARCHAR(30), `direccion` VARCHAR(80), `ciudad` VARCHAR(30), `email_user` VARCHAR(50), `idUsuario` INT)   BEGIN 
INSERT INTO pedido(`idPedido`,`id_transaccion`,`Valor`,`estado`,`fechaPedido`,`email`,`nombre`,`apellido`,`direccion`,`ciudad`,`email_user`,`idUsuario`) VALUES (idPedido, id_transaccion, Valor, estado, fechaPedido, email, nombre, apellido,direccion,ciudad,email_user, idUsuario); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modificarp` (`id` INT, `precio` FLOAT)   BEGIN
UPDATE repuesto set precioUnidad=precio WHERE precio BETWEEN
precioUnidad-((precioUnidad*5)/100) and precioUnidad+((precioUnidad*5)/100) and
idRepuesto=id;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `Impuesto` (`Id` INT) RETURNS FLOAT  BEGIN
RETURN (SELECT (Valor*0.19) as impuesto FROM pedido WHERE idPedido=Id);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Vendido` () RETURNS INT(11)  BEGIN
RETURN (SELECT SUM(precio*cantidadProducto) as Total FROM
detalle);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cantidadproductosvendidos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `cantidadproductosvendidos` (
`IdRepuesto` int(11)
,`nombreRepuesto` varchar(50)
,`sum(d.cantidadProducto)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagen`) VALUES
(2, 'Herramienta Mecanica', 'https://ronixtools.com/es/blog/wp-content/uploads/2021/05/taladro-electrico.jpg?size=400x400'),
(4, 'Herramienta De Sujecion', 'https://wikisivar.com/wp-content/uploads/2021/05/herramientas-de-sujecion-alicates.jpg?size=400x400'),
(5, 'Herramienta De Golpe', 'https://img14.360buyimg.com/n1/jfs/t1/150944/22/12855/48844/5fe94cecEf4e6724f/eb613a40dc6d599a.jpg?size=400x400'),
(6, 'Herramienta De Union', 'https://www.revista.ferrepat.com/wp-content/uploads/2016/07/kerf-soldadura-04.jpg?size=400x400'),
(7, 'Herramienta De Medicion', 'https://blog.floorcenter.com/wp-content/uploads/2020/04/Gather-materials-and-determine-the-average-size-of-your-tiles-1024x683.jpg?size=400x400'),
(8, 'Herramienta De Corte', 'https://www.masferreteria.com/blog/wp-content/uploads/2018/05/herramientas-corte-abrasion.jpg?size=400x400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idDetalle` int(11) NOT NULL,
  `nombreRepuesto` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `idRepuesto` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`idDetalle`, `nombreRepuesto`, `precio`, `cantidadProducto`, `idRepuesto`, `idPedido`) VALUES
(2, 'Pulidora', 120, 1, 1, 5),
(3, 'Sierra Circular', 283, 1, 3, 5),
(4, 'Sierra Caladora', 198, 3, 4, 5),
(5, 'Pulidora', 120, 1, 1, 6),
(6, 'Sierra Circular', 283, 1, 3, 6),
(7, 'Sierra Caladora', 198, 3, 4, 6),
(8, 'Pulidora', 120, 1, 1, 1),
(9, 'Sierra Circular', 283, 1, 3, 1),
(10, 'Sierra Caladora', 198, 3, 4, 1),
(11, 'Taladro Percutor', 1045, 1, 2, 2),
(12, 'Rotomartillo', 946, 1, 7, 2),
(13, 'Clavadora Electrica', 223, 1, 5, 2),
(14, 'Rebordeadora', 299670, 1, 11, 2),
(15, 'Pulidora', 120, 1, 1, 3),
(16, 'Taladro Percutor', 1045, 1, 2, 3);

--
-- Disparadores `detalle`
--
DELIMITER $$
CREATE TRIGGER `Eliminar` BEFORE DELETE ON `detalle` FOR EACH ROW begin
insert into detalle (idDetalle, cantidadProducto, idRepuesto, idPedido) values (old.idDetalle, old.cantidadProducto, old.idRepuesto,
old.idPedido);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `id_transaccion` int(11) NOT NULL,
  `Valor` double NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fechaPedido` datetime NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `id_transaccion`, `Valor`, `estado`, `fechaPedido`, `email`, `nombre`, `apellido`, `direccion`, `ciudad`, `email_user`, `idUsuario`) VALUES
(1, 72468141, 997, 'COMPLETED', '2022-10-22 00:00:00', 'sb-58fzz20815158@personal.example.com', 'John', 'Doe', 'Free Trade Zone', 'Bogota', 'jmartinez@gmail.com', NULL),
(2, 1, 301884, 'COMPLETED', '2022-10-22 00:00:00', 'sb-58fzz20815158@personal.example.com', 'John', 'Doe', 'Free Trade Zone', 'Bogota', 'jmartinez@gmail.com', NULL),
(3, 8, 1165, 'COMPLETED', '2022-10-27 00:00:00', 'sb-58fzz20815158@personal.example.com', 'John', 'Doe', 'Free Trade Zone', 'Bogota', 'jmartinez@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `idRepuesto` int(11) NOT NULL,
  `nombreRepuesto` varchar(50) NOT NULL,
  `descripcionRepuesto` varchar(100) NOT NULL,
  `precioUnidad` double NOT NULL,
  `estadoRepuesto` tinyint(1) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`idRepuesto`, `nombreRepuesto`, `descripcionRepuesto`, `precioUnidad`, `estadoRepuesto`, `imagen`, `id_categoria`) VALUES
(1, 'Pulidora', 'Pulidora 4 -1/2 650w 12000rpm Black + Decker G650-b3', 120, 1, 'https://belltec.com.co/3727-large_default/pulidora-4-12-1100w-sjs-ii-anti-restart-freno-mecanico.jpg', 4),
(2, 'Taladro Percutor', 'uyyfrtss', 1045, 1, 'https://upick-co.s3.amazonaws.com/uploads/product/photo/38610/5046-1.jpg', 6),
(3, 'Sierra Circular', 'Sierra Circular 1400w + Disco Black & Decker Cs1004-b3', 283, 1, 'https://www.skil.com.co/co/es/ocsmedia/optimized/550/SKIL_5200_(1).png?size=400x400', 8),
(4, 'Sierra Caladora', 'Sierra Caladora Black & Decker Ks501-b3', 198, 1, 'https://belltec.com.co/4754-large_default/sierra-caladora-black-decker-ks501-b3.jpg?size=400x400', 8),
(5, 'Clavadora Electrica', 'Engrapadora/clavadora Electrica Stanley 120 Vol Tre550', 223, 1, 'https://belltec.com.co/9154-large_default/engrapadoraclavadora-electrica-stanley-120-vol-tre550-.jpg?size=400x400', 6),
(6, 'Guia De Corte', 'Guia De Corte 565 Multiuso 3 Brocas Dremel 26150565ac', 81, 1, 'https://belltec.com.co/14892-large_default/guia-de-corte-565-multiuso-3-brocas-dremel-26150565ac.jpg?size=400x400', 8),
(7, 'Rotomartillo', 'Rotomartillo', 946, 1, 'https://belltec.com.co/2723-large_default/rotomartillo-134-sds-max-dewalt.jpg', 4),
(8, 'Mototool Angular', 'Mototool Angular Neumático 1/4 Dewalt Dwmt70782l', 459, 1, 'https://belltec.com.co/4811-large_default/mototool-angular-neumatico-14-dewalt-dwmt70782l.jpg?size=400x400', 8),
(9, 'Sierra De Mesa', 'Sierra De Mesa Stanley 1800w 10 Sst1801-b3\r\n', 124, 1, 'https://belltec.com.co/12913-large_default/sierra-de-mesa-stanley-1800w-10-sst1801-b3.jpg', 8),
(10, 'Ruteadora', 'Ruteadora Skil 1831 1100W 127V', 429, 1, 'http://www.mvdpanel.net/imagenes/bm42bozouni3gp/45974/mvdpanel_283-423-9_19445.jpg?size=400x400', 8),
(11, 'Rebordeadora', 'Rebordeadora 6mm 1/4 PuLG 530w Makita Mt M3700g\r\n', 299670, 1, 'https://http2.mlstatic.com/D_967327-MCO48250322849_112021-Y.jpg?size=400x400', 8),
(12, 'Disco Segmentado', 'Disco Segmentado Doble Copa De 4 1/2 Para Pulidora', 31990, 1, 'https://www.ferreteriasamir.com/885-large_default/disco-diamantado-4-12-segmentado-abracol.jpg', 8),
(13, 'Corta Cerámica', 'Corta Cerámica Bellota Pass60 60cm con Rodel 6 U', 271400, 1, 'https://toolcraft.mx/media/catalog/product/cache/5543828cb45a5dbcdd66b3a383e50b78/t/c/tc1769.jpg?size=400x400', 8),
(14, 'Escuadra De Combinación', 'Escuadra de Combinación de 30.48 cm marca Stanley', 87480, 1, 'http://www.kth.is/wp-content/uploads/2017/12/46-028-800x800.png?size=400x400', 7),
(16, 'Decametro', 'Decametro Cinta Metrica 20 Metros', 29900, 1, 'https://admin.capris.cr/media/catalog/product/2/6/263059.jpg?size=400x400', 7),
(17, 'Guía Acero', 'Guía Acero Sonda Para Cable 15 Metros Fulgure', 52410, 1, 'https://i.linio.com/p/b30799d96b072fcc6a6308c4e665b7cc-zoom.jpg?size=400x400', 7),
(18, 'Flexometro', 'Flexometro 5 Metros*3/4 Stanley 30-615', 21900, 1, 'https://provesi.com.co/2274-large_default/flexometro-global-5mts-30-615-stanley.jpg', 7),
(19, 'Calibrador', 'Calibrador Stanley 78-201', 129900, 1, 'https://images-americanas.b2w.io/produtos/60408968/imagens/paquimetro-stanley-aco-150x0-02-6/60408965_1_large.jpg?size=400x400', 7),
(20, 'Duplicador', 'Herramienta De Duplicador Universal Para Regla Y Contorneado', 121530, 1, 'https://salt.tikicdn.com/ts/product/fc/c1/fa/1ccd6d1c91c163e65e60486c73db0abe.jpg?size=400x400', 7),
(23, 'Medidor De Distancia', 'Herramienta de medición láser, alcance de 65 pies', 355940, 1, 'https://mobileimages.lowes.com/productimages/3d97632e-e9dc-4064-bb85-d7e80f72bfc0/09215873.jpg?size=400x400', 7),
(24, 'Soldadora', 'Soldadora inverter Furius Fix 161 mini naranja 50Hz/60Hz 110V', 331410, 1, 'https://cdn.shopify.com/s/files/1/0274/5804/3990/products/FW161M_large.jpg?v=1638630947?size=400x400', 6),
(25, 'Cautin', 'Cautin Profesional Tipo Lápiz Temperatura Ajustable 6 Puntas', 70800, 1, 'https://dualtronica.com/2521-large_default/cautin-40w-110v-130v.jpg', 6),
(26, 'Conector', 'Conector Para Equipo De Soldadura Borne Pequeño', 18700, 1, 'https://m.media-amazon.com/images/I/6159XJVxZsL.jpg', 6),
(27, 'Careta', 'Careta Mascara Inteligente Para Soldar Fotosensible', 99900, 1, 'http://cdn.shopify.com/s/files/1/0013/5033/6614/products/CARETAPARASOLDARECONOMICATIPOHUEVITO_4_1200x1200.jpg?v=1614189131', 6),
(28, 'Rollo Soldadura', 'Rollo Soldadura Mig Sin Gas Flux Cored 0.035 (1 Mm) X 1 Kilo', 109900, 1, 'https://www.extremewelds.com/co/wp-content/uploads/sites/2/2020/07/soldadura-extreme-welds-er70S-6.jpg', 6),
(29, 'Prensa Magnética', 'Soporte Prensa Magnética De Soldadura Imán De Flecha De 25lb', 22900, 1, 'https://cdn.manomano.com/iman-para-ensambles-krt552304-escuadra-magnetica-P-5647000-40393695_1.jpg?size=400x400', 6),
(30, 'Gas Mapp', 'Gas Mapp Pro Para Soldar', 38000, 1, 'https://admin.capris.cr/media/catalog/product/3/8/380866_3.jpg?size=400x400', 6),
(31, 'Soplete', 'Antorcha Soplete De Gas Butano Para Soldadura', 39900, 1, 'https://falabella.scene7.com/is/image/FalabellaCO/5769681_1?wid=800&hei=800&qlt=70', 6),
(33, 'Martillo', 'Martillo 8001-c Pulido Mango Fibra De Vidrio 18oz', 28400, 1, 'https://www.ferreteriasamir.com/6372-large_default/martillo-metalico-12onzas-23mm-stanprof.jpg', 5),
(34, 'Mazo', 'Porra - Mazo - Martillo Octagonal 2lbs', 36900, 1, 'https://www.mark1hire.co.uk/wp-content/uploads/2018/08/SLEDGE.jpg?size=400x400', 5),
(35, 'Cincel Plano', 'Cincel Plano Sds Plus 20 Mm X 140 Mm Makita D19168', 9600, 1, 'https://5.imimg.com/data5/GK/QD/MY-2388873/metal-chisel-500x500.jpg?size=400x400', 5),
(36, 'Juego De Botadores', 'Juego De Botadores 6pz Sata 09162', 99980, 1, 'https://belltec.com.co/10989-large_default/juego-de-botadores.jpg', 5),
(37, 'Mazo Octagonal', 'Mazo Octagonal 8 Lbs. Mango Madera 36', 212900, 1, 'https://s.yimg.com/aah/yhst-88039420719426/council-tool-20-lbs-sledge-hammer-36-straight-handle-48.jpg?size=400x400', 5),
(38, 'Taladro De Banco', 'Taladro De Banco Elite De 500 Watts. 2/3 Hp, 5 Velocidades', 669900, 1, 'https://ferrescaleras.com/wp-content/uploads/2020/06/37-300x300.jpg?size=400x400', 4),
(39, 'Gato Mecánico', 'Gato Mecánico Tipo Tijera O Tornillo Para 1.5 Toneladas', 84900, 1, 'https://www.mikels.com.mx/media/catalog/product/cache/95aae7ce13a353d20b736b25a0c71a20/7/5/7501081000154_1.jpg', 4),
(40, 'Tornillo De Banco', 'Tornillo De Banco Tipo Europeo, Hierro Nodular, 8', 2120000, 1, 'https://marelisac.com/5191-medium_default/tornillo-de-banco-industrial-ancho-de-mordaza-8-apertura-max-6-peso-209kg-tb-8p-26044-pretul.jpg?size=400x40', 4),
(41, 'Tornillo en G', 'Abrazadera En G Grande 3', 37750, 1, 'https://i0.wp.com/www.ingmecafenix.com/wp-content/uploads/2018/09/Sargento-tipo-c.webp?resize=683%2C684&ssl=1', 4),
(42, 'Prensa Rapida', 'Prensa Rapida F 50x200mm Uyustools', 19900, 1, 'https://maquitodo.com.co/30943-thickbox_default/prensa-rapida-32-800x150mm40x10mm-urko.jpg?size=400x400', 4),
(43, 'Prensa Ajustable', 'Prensa Ajustable Pony 3/4 X 4 Unidades Pcl034 Uyustools', 140000, 1, 'https://tlapalero-16ac7.kxcdn.com/media/catalog/product/cache/1/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/i/q/iqz059.jpg?size=400x400', 4),
(44, 'Alicate Universal', 'Alicate Universal 8 Pulgadas Alu208 Uyustools', 22900, 1, 'https://ar.stanleytools.global/LAG/PRODUCT/IMAGES/HIRES/70-488/70-488_02.jpg?resize=530x530', 4),
(45, 'Alicate Punta Redonda', 'Alicate Punta Redonda Comfort Grip 5pg Truper', 13987, 1, 'https://profimag.bg/wp-content/uploads/3119-00__17370-dalgousti-kleshti-obli-2.jpg?size=400x400', 4),
(46, 'Alicate Articulado Expansivo', 'Alicate Articulado Expansivo Pico Loro 12 Pulgadas Uystools', 29900, 1, 'https://promart.vteximg.com.br/arquivos/ids/404806-900-820/31204.jpg?v=637177461367030000', 4),
(47, 'Alicate De Punta Largo', 'Alicate De Punta Extra Largo 11 X 0° Recto Uyustools Alp011', 33200, 1, 'https://m.media-amazon.com/images/I/51zgp5XJ2rL.jpg', 4),
(48, 'Lijadora', 'Lijadora profesional orbital Truper LIOR-1/4A2 naranja 60Hz 200W 120V', 137900, 1, 'https://belltec.com.co/8129-large_default/lijadora-roto-orbital-5-300w-stanley-velocidad-variable-ss30-b3.jpg', 2),
(49, 'Compresor Compacto', 'Compresor Compacto De 2hp 110v 115psi 24l Automatico 8.2cfm', 530000, 1, 'https://fabriles.com.co/wp-content/uploads/2021/08/ZBS06-A.jpg', 2),
(50, 'Multimetro Automotriz', 'Multimetro Automotriz Tsd129 Uyustools', 137900, 1, 'https://625274-2032172-1-raikfcquaxqncofqfm.stackpathdns.com/942-thickbox_default/multimetro-digital-automotriz-ut105-.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `repuestos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `repuestos` (
`categoria` varchar(50)
,`nombreRepuesto` varchar(50)
,`cantidadProducto` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `apellidoUsuario` varchar(50) NOT NULL,
  `rolUsuario` varchar(7) NOT NULL DEFAULT 'Cliente',
  `documentoUsuario` int(11) NOT NULL,
  `direccionUsuario` varchar(50) NOT NULL,
  `correoUsuario` varchar(50) NOT NULL,
  `passwordUsuario` varchar(25) DEFAULT NULL,
  `telefonoUsuario` int(15) NOT NULL,
  `estadoUsuario` tinyint(1) NOT NULL DEFAULT 1,
  `perfil` varchar(100) NOT NULL DEFAULT 'defaul.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `rolUsuario`, `documentoUsuario`, `direccionUsuario`, `correoUsuario`, `passwordUsuario`, `telefonoUsuario`, `estadoUsuario`, `perfil`) VALUES
(1, 'María', 'Rodriguez', 'Cliente', 5010177, 'Av100_12', 'mrodriguez@gmail.com', 'mrodriguez', 31032414, 1, 'img/1666137273_WhatsApp Image 2022-07-14 at 6.00.30 PM.jpeg'),
(2, 'Jose', 'Martinez', 'Cliente', 5010111, 'Kr 43 No.19-8', 'jmartinez@gmail.com', 'jmartinez', 32031019, 1, 'defaul.png'),
(3, 'Luis', 'Garcia', 'Cliente', 5010122, 'Cll 82 B No.170', 'lgarcia@gmail.com', 'lgarcia', 32031817, 1, 'defaul.png'),
(4, 'Luz', 'Gomez', 'Cliente', 5010133, 'Av 46 No.67-189', 'lgomez@gmail.com', 'lgomez', 32032726, 1, 'defaul.png'),
(5, 'Ana', 'Lopez', 'Cliente', 5010144, 'Kr 23 A 25', 'alopez@gmail.com', 'alopez', 32034547, 1, 'defaul.png'),
(6, 'Carlos', 'Gonzales', 'Gerente', 5010155, 'Av 56 B No. 67-98', 'cgonzalez@gmail.com', 'cgonzalez', 32036754, 1, 'defaul.png'),
(7, 'Juan', 'Hernndez', 'Cliente', 5010166, 'Kr 12 No.65-764', 'jhernandez@gmail.com', 'jhernandez', 32037654, 1, 'defaul.png'),
(8, 'Jorge', 'Sanchez', 'Gerente', 5010188, 'Cll 76 C No.876-76', 'jsanchez@gmail.com', 'jsanchez', 32037658, 1, 'defaul.png'),
(9, 'Martha', 'Perez', 'Cliente', 5010199, 'Av 67 No.76-98', 'mperez@gmail.com', 'mperez', 32033412, 1, 'defaul.png'),
(10, 'Sandra', 'Ramirez', 'Cliente', 5010101, 'Kr 13 A No.76', 'sramirez@gmail.com', 'sramirez', 32038768, 1, 'defaul.png'),
(11, 'Yhelsin', 'Alvarado', 'Cliente', 10207987, 'carrera 5A tuno', 'yhelsin2006@gmail.com', 'yhelsin2005', 32077689, 1, 'defaul.png'),
(12, 'Zharik', 'Calderon', 'Cliente', 1097538, 'Carrera 5bis Sucre', 'zharikd@gmail.com', 'zharikd', 576147891, 1, 'defaul.png'),
(17, 'breyner', 'giral', 'Cliente', 10204455, 'aurora', 'bshgs@gmail.com', 'sjadvhad', 1244, 1, 'defaul.png'),
(19, 'breyner', 'giral', 'Cliente', 10204455, 'aurora', 'jmartinez@gmail.com', 'yjf', 12324, 1, 'defaul.png'),
(20, 'johan', 'giral', 'Cliente', 10204455, 'aurora', 'jmartinez@gmail.com', 'jlkhgfgd', 74474, 1, 'defaul.png'),
(23, 'breyner', 'giral', 'Cliente', 10204455, 'aurora', 'breyy122@misena.edu.co', 'djsashf', 125632, 1, 'defaul.png');

-- --------------------------------------------------------

--
-- Estructura para la vista `cantidadproductosvendidos`
--
DROP TABLE IF EXISTS `cantidadproductosvendidos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cantidadproductosvendidos`  AS SELECT `r`.`idRepuesto` AS `IdRepuesto`, `r`.`nombreRepuesto` AS `nombreRepuesto`, sum(`d`.`cantidadProducto`) AS `sum(d.cantidadProducto)` FROM (`repuesto` `r` join `detalle` `d`) WHERE `d`.`idRepuesto` = `r`.`idRepuesto``idRepuesto`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `repuestos`
--
DROP TABLE IF EXISTS `repuestos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `repuestos`  AS SELECT `c`.`categoria` AS `categoria`, `r`.`nombreRepuesto` AS `nombreRepuesto`, `d`.`cantidadProducto` AS `cantidadProducto` FROM ((`repuesto` `r` join `categorias` `c` on(`r`.`id_categoria` = `c`.`id`)) join `detalle` `d` on(`r`.`idRepuesto` = `d`.`idRepuesto`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`idRepuesto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `idRepuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idRepuesto`) REFERENCES `repuesto` (`idRepuesto`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD CONSTRAINT `repuesto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
