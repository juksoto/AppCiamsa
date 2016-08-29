-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-08-2016 a las 22:17:37
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appciamsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_categories`
--

CREATE TABLE `ciam_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciam_categories`
--

INSERT INTO `ciam_categories` (`id`, `category`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Forkamix', '', 1, '2016-08-09 21:41:02', '2016-08-09 21:41:02'),
(2, 'Nutrikimia', '', 1, '2016-08-09 21:51:16', '2016-08-09 21:51:16'),
(3, 'Simples', '', 1, '2016-08-09 22:09:29', '2016-08-09 22:09:29'),
(4, 'Complementarios', '', 1, '2016-08-09 22:09:42', '2016-08-11 15:32:16'),
(5, 'Nitroeffi', '', 1, '2016-08-09 22:14:39', '2016-08-09 22:14:39'),
(6, 'Otros', '', 1, '2016-08-10 15:30:01', '2016-08-10 15:30:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_crops_stage`
--

CREATE TABLE `ciam_crops_stage` (
  `id` int(10) UNSIGNED NOT NULL,
  `stage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciam_crops_stage`
--

INSERT INTO `ciam_crops_stage` (`id`, `stage`, `subline`, `image`, `order_number`, `type_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Siembra', '', 'stage-crops-siembra-platano.png', '1', 10, 1, '2016-08-09 19:20:51', '2016-08-09 19:36:44'),
(2, 'Crecimiento Y Desarrollo', '', 'stage-crops-crecimiento-y-desarrollo-platano.png', '2', 10, 1, '2016-08-09 19:21:18', '2016-08-09 19:21:18'),
(3, 'Producción', '', 'stage-crops-produccion-platano.png', '3', 10, 1, '2016-08-09 19:21:46', '2016-08-09 19:21:46'),
(4, 'Siembra', '', 'stage-crops-siembra-cana.png', '1', 3, 1, '2016-08-09 20:31:59', '2016-08-09 20:31:59'),
(5, 'Primera Y Segunda Aplicación', '', 'stage-crops-primera-y-segunda-aplicacion-cana.png', '2', 3, 1, '2016-08-09 20:32:27', '2016-08-09 20:32:27'),
(6, 'Siembra', '', 'stage-crops-siembra-cafe.png', '1', 2, 1, '2016-08-09 20:47:12', '2016-08-09 20:47:12'),
(7, 'Crecimiento Y Desarrollo', '', 'stage-crops-crecimiento-y-desarrollo-cafe.png', '2', 2, 1, '2016-08-09 20:47:28', '2016-08-09 20:47:28'),
(8, 'Producción', '', 'stage-crops-produccion-cafe.png', '3', 2, 1, '2016-08-09 20:48:03', '2016-08-09 20:48:03'),
(9, 'Siembra', '', 'stage-crops-siembra-maiz.png', '1', 6, 1, '2016-08-09 20:58:04', '2016-08-10 17:12:02'),
(10, 'Produccion', '', 'stage-crops-produccion-maiz.png', '2', 6, 1, '2016-08-09 20:58:31', '2016-08-10 17:15:49'),
(11, 'Siembra', '', 'stage-crops-siembra-pasto.png', '1', 9, 1, '2016-08-09 21:16:31', '2016-08-09 21:16:31'),
(12, 'Crecimiento Y Desarrollo', '', 'stage-crops-crecimiento-y-desarrollo-pasto.png', '2', 9, 1, '2016-08-09 21:18:03', '2016-08-09 21:18:03'),
(13, 'Siembra', '(Levante)', 'stage-crops-siembra-arroz.png', '1', 1, 1, '2016-08-10 16:23:08', '2016-08-10 16:23:08'),
(14, 'Segunda Aplicación', '', 'stage-crops-segunda-aplicacion-arroz.png', '2', 1, 1, '2016-08-10 16:24:03', '2016-08-10 16:24:03'),
(15, 'Producción O Llenado', '', 'stage-crops-produccion-o-llenado-arroz.png', '3', 1, 1, '2016-08-10 16:24:42', '2016-08-10 16:24:42'),
(16, 'Siembra O Remate', '', 'stage-crops-siembra-o-remate-papa.png', '1', 8, 1, '2016-08-10 17:10:47', '2016-08-10 17:10:47'),
(17, 'Reabone O Desyerbe', '', 'stage-crops-reabone-o-desyerbe-papa.png', '2', 8, 1, '2016-08-10 17:11:07', '2016-08-10 17:11:07'),
(18, 'Siembra', '', 'stage-crops-siembra-frutales.png', '1', 4, 1, '2016-08-10 19:36:10', '2016-08-10 19:36:10'),
(19, 'Crecimiento Y Desarrollo', '', 'stage-crops-crecimiento-y-desarrollo-frutales.png', '2', 4, 1, '2016-08-10 19:36:45', '2016-08-10 19:36:45'),
(20, 'Frutos', '', 'stage-crops-frutos-frutales.png', '3', 4, 1, '2016-08-10 19:37:03', '2016-08-10 19:37:03'),
(21, 'Siembra', '', 'stage-crops-siembra-palma.png', '1', 7, 1, '2016-08-16 19:52:39', '2016-08-16 19:52:39'),
(22, 'Crecimiento', '', 'stage-crops-crecimiento-palma.png', '2', 7, 1, '2016-08-16 19:52:55', '2016-08-16 19:52:55'),
(23, 'Producción', '', 'stage-crops-produccion-palma.png', '3', 7, 1, '2016-08-16 19:53:21', '2016-08-16 19:53:21'),
(24, 'Siembra', '', 'stage-crops-siembra-hortalizas.png', '1', 5, 1, '2016-08-16 20:07:24', '2016-08-16 20:07:24'),
(25, 'Crecimiento', '', 'stage-crops-crecimiento-hortalizas.png', '2', 5, 1, '2016-08-16 20:07:35', '2016-08-16 20:07:35'),
(26, 'Producción', '', 'stage-crops-produccion-.png', '3', 5, 1, '2016-08-16 20:07:49', '2016-08-16 20:07:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_crops_type`
--

CREATE TABLE `ciam_crops_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `crops` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciam_crops_type`
--

INSERT INTO `ciam_crops_type` (`id`, `crops`, `icon`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Arroz', 'icon-arroz.png', 1, '2016-08-09 04:31:54', '2016-08-09 05:00:04'),
(2, 'Café', 'icon-cafe.png', 1, '2016-08-09 04:34:54', '2016-08-09 05:01:38'),
(3, 'Caña', 'icon-cana.png', 1, '2016-08-09 05:01:46', '2016-08-09 05:01:46'),
(4, 'Frutales', 'icon-frutales.png', 1, '2016-08-09 05:01:55', '2016-08-09 05:01:55'),
(5, 'Hortalizas', 'icon-hortalizas.png', 1, '2016-08-09 05:02:03', '2016-08-09 05:02:03'),
(6, 'Maíz', 'icon-maiz.png', 1, '2016-08-09 05:02:15', '2016-08-09 05:02:15'),
(7, 'Palma', 'icon-palma.png', 1, '2016-08-09 05:02:23', '2016-08-09 05:02:23'),
(8, 'Papa', 'icon-papa.png', 1, '2016-08-09 05:02:30', '2016-08-09 05:02:30'),
(9, 'Pasto', 'icon-pasto.png', 1, '2016-08-09 05:02:36', '2016-08-09 05:02:36'),
(10, 'Platano', 'icon-platano.png', 1, '2016-08-09 05:02:44', '2016-08-09 05:02:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_departments`
--

CREATE TABLE `ciam_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `departments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciam_departments`
--

INSERT INTO `ciam_departments` (`id`, `departments`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Amazonas', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(2, 'Antioquia', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(3, 'Arauca', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(4, 'Atlantico', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(5, 'Bogota', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(6, 'Bolívar', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(7, 'Boyacá', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(8, 'Caldas', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(9, 'Caquetá', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(10, 'Casanare', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(11, 'Cauca', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(12, 'Cesar', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(13, 'Choco', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(14, 'Córdoba', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(15, 'Cundinamarca', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(16, 'Guainía', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(17, 'Guaviare', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(18, 'Huila', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(19, 'La Guajira', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(20, 'Magdalena', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(21, 'Meta', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(22, 'Nariño', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(23, 'Norte de Santander', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(24, 'Putumayo', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(25, 'Quindio', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(26, 'Risaralda', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(27, 'San Andrés y Providencia', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(28, 'Santander', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(29, 'Sucre', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(30, 'Tolima', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(31, 'Valle del Cauca', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(32, 'Vaupés', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27'),
(33, 'Vichada', 1, '2016-08-09 19:19:27', '2016-08-09 19:19:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_password_resets`
--

CREATE TABLE `ciam_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_products`
--

CREATE TABLE `ciam_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `components` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciam_products`
--

INSERT INTO `ciam_products` (`id`, `product`, `components`, `image`, `category_id`, `active`, `created_at`, `updated_at`) VALUES
(1, '10-20-20', 'components-10-20-20.png', '10-20-20.png', 1, 1, '2016-08-09 21:44:29', '2016-08-09 21:44:29'),
(2, '10-20-30', 'components-10-20-30.png', '10-20-30.png', 1, 1, '2016-08-09 21:45:44', '2016-08-09 21:45:44'),
(3, '10-30-10', 'components-10-30-10.png', '10-30-10.png', 1, 1, '2016-08-09 21:46:06', '2016-08-09 21:46:06'),
(4, '12-34-12', 'components-12-34-12.png', '12-34-12.png', 1, 1, '2016-08-09 21:46:29', '2016-08-09 21:46:29'),
(5, '13-26-10', 'components-13-26-10.png', '13-26-10.png', 1, 1, '2016-08-09 21:47:24', '2016-08-09 21:47:24'),
(6, '14-4-23', 'components-14-4-23.png', '14-4-23.png', 1, 1, '2016-08-09 21:47:56', '2016-08-09 21:47:56'),
(7, '15-15-15', 'components-15-15-15.png', '15-15-15.png', 1, 1, '2016-08-09 21:48:13', '2016-08-09 21:48:13'),
(8, '17-6-18', 'components-17-6-18.png', '17-6-18.png', 1, 1, '2016-08-09 21:48:38', '2016-08-09 21:48:38'),
(9, '18-18-18', 'components-18-18-18.png', '18-18-18.png', 1, 1, '2016-08-09 21:48:59', '2016-08-09 21:48:59'),
(10, '22-3-20', 'components-22-3-20.png', '22-3-20.png', 1, 1, '2016-08-09 21:49:20', '2016-08-10 16:43:05'),
(11, '24-0-17', 'components-24-0-17.png', '24-0-17.png', 1, 1, '2016-08-09 21:49:39', '2016-08-09 21:49:39'),
(12, '25-4-24', 'components-25-4-24.png', '25-4-24.png', 1, 1, '2016-08-09 21:50:12', '2016-08-09 21:50:12'),
(13, '25-15-0', 'components-25-15-0.png', '25-15-0.png', 1, 1, '2016-08-09 21:50:31', '2016-08-09 21:50:31'),
(14, '34-5-5', 'components-34-5-5.png', '34-5-5.png', 1, 1, '2016-08-09 21:50:54', '2016-08-09 21:50:54'),
(15, '8-24-24-2s', 'components-8-24-24-2s.png', '8-24-24-2s.png', 2, 1, '2016-08-09 21:52:14', '2016-08-09 21:52:14'),
(16, '12-24-12', 'components-12-24-12.png', '12-24-12.png', 2, 1, '2016-08-09 21:52:36', '2016-08-09 21:52:36'),
(17, '15-15-15', 'components-15-15-15.png', '15-15-15.png', 2, 1, '2016-08-09 22:06:39', '2016-08-10 17:48:16'),
(18, '16-16-16', 'components-16-16-16.png', '16-16-16.png', 2, 1, '2016-08-09 22:07:22', '2016-08-09 22:07:22'),
(19, '27-6-6', 'components-27-6-6.png', '27-6-6.png', 2, 1, '2016-08-09 22:07:40', '2016-08-09 22:07:40'),
(20, 'Dap', 'components-dap.png', 'dap.png', 3, 1, '2016-08-09 22:10:06', '2016-08-09 22:10:06'),
(21, 'Esta Kieserita', 'components-esta-kieserita.png', 'esta-kieserita.png', 3, 1, '2016-08-09 22:10:34', '2016-08-09 22:10:34'),
(22, 'Kcl Estandar', 'components-kcl-estandar.png', 'kcl-estandar.png', 3, 1, '2016-08-09 22:10:59', '2016-08-09 22:10:59'),
(23, 'Kcl Tradicional', 'components-kcl-tradicional.png', 'kcl-tradicional.png', 3, 1, '2016-08-09 22:11:21', '2016-08-09 22:11:21'),
(24, 'Kieserita', 'components-kieserita.png', 'kieserita.png', 3, 1, '2016-08-09 22:11:55', '2016-08-09 22:11:55'),
(25, 'Map', 'components-map.png', 'map.png', 3, 1, '2016-08-09 22:12:14', '2016-08-09 22:12:14'),
(26, 'Korn Kali Boro', 'components-korn-kali-boro.png', 'korn-kali-boro.png', 3, 1, '2016-08-09 22:12:35', '2016-08-10 15:36:53'),
(27, 'Sam', 'components-sam.png', 'sam.png', 3, 1, '2016-08-09 22:13:03', '2016-08-09 22:13:03'),
(28, 'Sam Estándar', 'components-sam-estandar.png', 'sam-estandar.png', 3, 1, '2016-08-09 22:13:35', '2016-08-09 22:13:35'),
(29, 'Urea Granulada', 'components-urea-granulada.png', 'urea-granulada.png', 3, 1, '2016-08-09 22:14:01', '2016-08-09 22:14:01'),
(30, 'Urea Prilled', 'components-urea-prilled.png', 'urea-prilled.png', 3, 1, '2016-08-09 22:14:22', '2016-08-09 22:14:22'),
(31, 'Nitroeffi 100', 'components-nitroeffi-100.png', 'nitroeffi-100.png', 5, 1, '2016-08-09 22:15:07', '2016-08-10 15:49:58'),
(32, 'Solución Uan', 'components-solucion-uan.png', 'solucion-uan.png', 5, 1, '2016-08-09 22:15:33', '2016-08-09 22:15:33'),
(33, 'Mezclas A La Medida', 'components-mezclas-a-la-medida.png', 'mezclas-a-la-medida.png', 6, 1, '2016-08-10 15:31:09', '2016-08-10 15:31:09'),
(34, 'Mezclas A La Medida', 'components-mezclas-a-la-medida.png', 'mezclas-a-la-medida.png', 4, 1, '2016-08-10 15:32:46', '2016-08-10 15:32:46'),
(35, 'Korn Kali Boro', 'components-korn-kali-boro.png', 'korn-kali-boro.png', 4, 1, '2016-08-10 15:36:38', '2016-08-10 15:36:38'),
(36, 'Kcl', 'components-kcl.png', 'kcl.png', 4, 1, '2016-08-10 15:48:16', '2016-08-10 15:48:16'),
(37, 'Esta Kieserita', 'components-esta-kieserita.png', 'esta-kieserita.png', 4, 1, '2016-08-10 15:48:57', '2016-08-10 15:48:57'),
(38, 'Urea Granulada', 'components-urea-granulada.png', 'urea-granulada.png', 4, 1, '2016-08-10 15:49:23', '2016-08-10 16:34:03'),
(39, 'Nitroeffi 100', 'components-nitroeffi-100.png', 'nitroeffi-100.png', 4, 1, '2016-08-10 15:49:44', '2016-08-10 15:49:44'),
(40, 'Solución Uan', 'components-solucion-uan.png', 'solucion-uan.png', 4, 1, '2016-08-10 15:50:38', '2016-08-10 15:50:38'),
(41, 'Forkamix 27-6-6', 'components-forkamix-27-6-6.png', 'forkamix-27-6-6.png', 4, 1, '2016-08-10 15:52:49', '2016-08-10 18:05:33'),
(42, 'Kieserita', 'components-kieserita.png', 'kieserita.png', 4, 1, '2016-08-10 15:54:23', '2016-08-10 16:39:53'),
(43, 'Urea Prilled', 'components-urea-prilled.png', 'urea-prilled.png', 4, 1, '2016-08-10 16:30:28', '2016-08-10 16:30:28'),
(44, 'Sam', 'components-sam.png', 'sam.png', 4, 1, '2016-08-10 17:59:06', '2016-08-10 17:59:06'),
(45, 'Sam Estándar', 'components-sam-estandar.png', 'sam-estandar.png', 4, 1, '2016-08-10 17:59:40', '2016-08-10 17:59:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_product_type_stage`
--

CREATE TABLE `ciam_product_type_stage` (
  `id` int(10) UNSIGNED NOT NULL,
  `crops_type_id` int(10) UNSIGNED NOT NULL,
  `crops_stage_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciam_product_type_stage`
--

INSERT INTO `ciam_product_type_stage` (`id`, `crops_type_id`, `crops_stage_id`, `product_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 9, 11, 20, 1, '2016-08-10 14:53:03', '2016-08-10 14:53:03'),
(2, 9, 11, 3, 1, '2016-08-10 14:53:24', '2016-08-10 14:53:24'),
(3, 9, 11, 5, 1, '2016-08-10 14:53:48', '2016-08-10 14:53:48'),
(4, 9, 11, 4, 1, '2016-08-10 14:55:49', '2016-08-10 14:55:49'),
(5, 9, 12, 31, 1, '2016-08-10 14:59:10', '2016-08-10 15:09:43'),
(6, 9, 12, 32, 1, '2016-08-10 14:59:25', '2016-08-10 15:09:25'),
(7, 9, 12, 14, 1, '2016-08-10 14:59:43', '2016-08-10 14:59:43'),
(8, 9, 12, 19, 1, '2016-08-10 15:10:17', '2016-08-10 15:10:17'),
(9, 9, 12, 27, 1, '2016-08-10 15:10:31', '2016-08-10 15:10:31'),
(10, 9, 12, 28, 1, '2016-08-10 15:10:39', '2016-08-10 15:10:39'),
(11, 9, 12, 29, 1, '2016-08-10 15:10:54', '2016-08-10 15:10:54'),
(12, 9, 12, 30, 1, '2016-08-10 15:11:04', '2016-08-10 15:11:04'),
(13, 3, 4, 3, 1, '2016-08-10 15:26:47', '2016-08-10 15:26:47'),
(14, 3, 4, 4, 1, '2016-08-10 15:27:01', '2016-08-10 15:27:01'),
(15, 3, 4, 20, 1, '2016-08-10 15:27:22', '2016-08-10 15:27:22'),
(16, 3, 4, 25, 1, '2016-08-10 15:27:32', '2016-08-10 15:27:32'),
(17, 3, 4, 34, 1, '2016-08-10 15:33:55', '2016-08-10 15:33:55'),
(18, 3, 5, 33, 1, '2016-08-10 15:35:43', '2016-08-10 15:35:43'),
(19, 3, 5, 35, 1, '2016-08-10 15:53:15', '2016-08-10 15:53:15'),
(20, 3, 5, 37, 1, '2016-08-10 15:53:25', '2016-08-10 15:53:25'),
(21, 3, 5, 42, 1, '2016-08-10 15:53:37', '2016-08-10 15:54:34'),
(22, 3, 5, 38, 1, '2016-08-10 15:54:53', '2016-08-10 15:54:53'),
(23, 3, 5, 39, 1, '2016-08-10 15:55:17', '2016-08-10 15:55:17'),
(24, 3, 5, 40, 1, '2016-08-10 15:55:29', '2016-08-10 15:55:29'),
(25, 3, 5, 36, 1, '2016-08-10 15:55:38', '2016-08-10 15:55:38'),
(26, 3, 5, 41, 1, '2016-08-10 15:55:49', '2016-08-10 15:55:49'),
(27, 1, 13, 15, 1, '2016-08-10 16:27:48', '2016-08-10 16:27:48'),
(28, 1, 13, 20, 1, '2016-08-10 16:28:02', '2016-08-10 16:28:02'),
(29, 1, 13, 25, 1, '2016-08-10 16:28:09', '2016-08-10 16:28:09'),
(30, 1, 14, 9, 1, '2016-08-10 16:28:19', '2016-08-10 16:28:19'),
(31, 1, 14, 7, 1, '2016-08-10 16:28:28', '2016-08-10 16:28:28'),
(32, 1, 14, 18, 1, '2016-08-10 16:28:38', '2016-08-10 16:28:38'),
(33, 1, 15, 12, 1, '2016-08-10 16:29:23', '2016-08-10 16:29:23'),
(34, 1, 15, 43, 1, '2016-08-10 16:33:48', '2016-08-10 16:33:48'),
(35, 1, 15, 36, 1, '2016-08-10 16:34:40', '2016-08-10 16:34:40'),
(36, 1, 15, 35, 1, '2016-08-10 16:34:54', '2016-08-10 16:34:54'),
(37, 1, 15, 39, 1, '2016-08-10 16:35:03', '2016-08-10 16:35:03'),
(38, 1, 15, 34, 1, '2016-08-10 16:35:15', '2016-08-10 16:35:15'),
(39, 2, 6, 5, 1, '2016-08-10 16:37:54', '2016-08-10 16:37:54'),
(40, 2, 6, 16, 1, '2016-08-10 16:38:05', '2016-08-10 16:38:05'),
(41, 2, 7, 13, 1, '2016-08-10 16:38:18', '2016-08-10 16:38:18'),
(42, 2, 7, 14, 1, '2016-08-10 16:38:30', '2016-08-10 16:38:30'),
(43, 2, 7, 8, 1, '2016-08-10 16:38:39', '2016-08-10 16:38:39'),
(44, 2, 7, 31, 1, '2016-08-10 16:38:51', '2016-08-10 16:38:51'),
(45, 2, 7, 37, 1, '2016-08-10 16:39:04', '2016-08-10 16:39:04'),
(46, 2, 7, 42, 1, '2016-08-10 16:39:16', '2016-08-10 16:39:16'),
(47, 2, 7, 35, 1, '2016-08-10 16:41:23', '2016-08-10 16:41:23'),
(48, 2, 7, 40, 1, '2016-08-10 16:41:34', '2016-08-10 16:41:34'),
(49, 2, 8, 10, 1, '2016-08-10 16:41:49', '2016-08-10 16:41:49'),
(50, 2, 8, 8, 1, '2016-08-10 16:44:17', '2016-08-10 16:44:17'),
(51, 2, 8, 35, 1, '2016-08-10 16:44:30', '2016-08-10 16:44:30'),
(52, 6, 9, 3, 1, '2016-08-10 17:06:36', '2016-08-10 17:06:36'),
(53, 6, 9, 4, 1, '2016-08-10 17:07:03', '2016-08-10 17:07:03'),
(54, 6, 9, 16, 1, '2016-08-10 17:07:15', '2016-08-10 17:07:15'),
(55, 6, 9, 37, 1, '2016-08-10 17:07:27', '2016-08-10 17:07:27'),
(56, 6, 9, 42, 1, '2016-08-10 17:07:38', '2016-08-10 17:07:38'),
(57, 6, 10, 33, 1, '2016-08-10 17:07:51', '2016-08-10 17:07:51'),
(58, 6, 10, 35, 1, '2016-08-10 17:08:01', '2016-08-10 17:08:01'),
(59, 6, 10, 36, 1, '2016-08-10 17:08:11', '2016-08-10 17:08:11'),
(60, 6, 10, 40, 1, '2016-08-10 17:08:23', '2016-08-10 17:08:55'),
(61, 6, 10, 39, 1, '2016-08-10 17:08:34', '2016-08-10 17:08:34'),
(62, 6, 10, 12, 1, '2016-08-10 17:09:14', '2016-08-10 17:09:14'),
(63, 8, 16, 3, 1, '2016-08-10 17:18:47', '2016-08-10 17:18:47'),
(64, 8, 16, 4, 1, '2016-08-10 17:18:56', '2016-08-10 17:18:56'),
(65, 8, 16, 5, 1, '2016-08-10 17:19:11', '2016-08-10 17:19:11'),
(66, 8, 16, 16, 1, '2016-08-10 17:19:25', '2016-08-10 17:19:25'),
(67, 8, 16, 21, 1, '2016-08-10 17:19:40', '2016-08-10 17:19:40'),
(68, 8, 16, 24, 1, '2016-08-10 17:19:52', '2016-08-10 17:19:52'),
(69, 8, 16, 20, 1, '2016-08-10 17:20:09', '2016-08-10 17:20:09'),
(70, 8, 16, 25, 1, '2016-08-10 17:22:04', '2016-08-10 17:22:04'),
(71, 8, 17, 7, 1, '2016-08-10 17:32:09', '2016-08-10 17:32:09'),
(72, 8, 17, 9, 1, '2016-08-10 17:32:18', '2016-08-10 17:32:18'),
(73, 8, 17, 18, 1, '2016-08-10 17:32:27', '2016-08-10 17:32:27'),
(74, 8, 17, 1, 1, '2016-08-10 17:33:34', '2016-08-10 17:33:34'),
(75, 8, 17, 2, 1, '2016-08-10 17:33:41', '2016-08-10 17:33:41'),
(76, 8, 17, 15, 1, '2016-08-10 17:33:50', '2016-08-10 17:33:50'),
(77, 8, 17, 31, 1, '2016-08-10 17:34:01', '2016-08-10 17:34:01'),
(78, 8, 17, 32, 1, '2016-08-10 17:34:18', '2016-08-10 17:34:18'),
(79, 8, 17, 6, 1, '2016-08-10 17:34:29', '2016-08-10 17:34:29'),
(80, 10, 1, 3, 1, '2016-08-10 17:40:13', '2016-08-10 17:40:13'),
(81, 10, 2, 35, 1, '2016-08-10 17:40:23', '2016-08-10 17:51:42'),
(82, 10, 2, 42, 1, '2016-08-10 17:40:34', '2016-08-10 17:51:48'),
(83, 10, 1, 20, 1, '2016-08-10 17:41:13', '2016-08-10 17:41:13'),
(84, 10, 1, 25, 1, '2016-08-10 17:41:21', '2016-08-10 17:41:21'),
(85, 10, 2, 9, 1, '2016-08-10 17:43:02', '2016-08-10 17:43:02'),
(86, 10, 2, 7, 1, '2016-08-10 17:43:14', '2016-08-10 17:43:14'),
(87, 10, 2, 18, 1, '2016-08-10 17:43:26', '2016-08-10 17:43:26'),
(88, 10, 2, 19, 1, '2016-08-10 17:43:43', '2016-08-10 17:43:43'),
(89, 10, 3, 15, 0, '2016-08-10 17:43:55', '2016-08-16 19:40:33'),
(90, 10, 1, 16, 1, '2016-08-10 17:44:04', '2016-08-10 18:00:33'),
(91, 10, 1, 4, 1, '2016-08-10 17:44:14', '2016-08-10 18:00:16'),
(92, 10, 2, 45, 1, '2016-08-10 17:44:26', '2016-08-10 17:59:46'),
(93, 10, 2, 44, 1, '2016-08-10 17:44:40', '2016-08-10 17:59:14'),
(94, 10, 2, 43, 1, '2016-08-10 17:44:49', '2016-08-10 17:58:24'),
(95, 10, 2, 38, 1, '2016-08-10 17:45:04', '2016-08-10 17:58:16'),
(96, 10, 2, 37, 1, '2016-08-10 17:45:14', '2016-08-10 17:58:05'),
(97, 10, 3, 12, 1, '2016-08-10 17:46:01', '2016-08-10 17:46:01'),
(98, 10, 3, 6, 1, '2016-08-10 17:46:09', '2016-08-10 17:46:09'),
(99, 10, 3, 10, 1, '2016-08-10 17:46:19', '2016-08-10 18:01:22'),
(100, 10, 2, 17, 1, '2016-08-10 17:47:54', '2016-08-10 17:47:54'),
(101, 10, 3, 32, 0, '2016-08-10 18:03:15', '2016-08-10 18:03:15'),
(102, 10, 3, 36, 1, '2016-08-10 18:03:29', '2016-08-10 18:03:29'),
(103, 10, 3, 35, 1, '2016-08-10 18:03:42', '2016-08-10 18:03:42'),
(104, 10, 3, 39, 1, '2016-08-10 18:03:58', '2016-08-10 18:03:58'),
(105, 10, 3, 40, 1, '2016-08-10 18:04:11', '2016-08-10 18:04:11'),
(106, 10, 3, 38, 1, '2016-08-10 18:04:34', '2016-08-10 18:04:34'),
(107, 10, 3, 43, 1, '2016-08-10 18:05:00', '2016-08-10 18:05:00'),
(108, 10, 3, 41, 1, '2016-08-10 18:05:10', '2016-08-10 18:05:10'),
(109, 10, 3, 44, 1, '2016-08-10 18:05:45', '2016-08-16 19:44:39'),
(110, 10, 3, 45, 1, '2016-08-10 18:05:52', '2016-08-10 18:05:52'),
(111, 10, 3, 37, 1, '2016-08-10 18:06:02', '2016-08-10 18:06:02'),
(112, 10, 3, 42, 1, '2016-08-10 18:06:15', '2016-08-10 18:06:15'),
(113, 1, 15, 38, 1, '2016-08-10 22:53:44', '2016-08-10 22:53:44'),
(114, 7, 21, 20, 1, '2016-08-16 20:08:43', '2016-08-16 20:08:43'),
(115, 7, 21, 25, 1, '2016-08-16 20:08:57', '2016-08-16 20:08:57'),
(116, 7, 21, 3, 1, '2016-08-16 20:09:11', '2016-08-16 20:09:29'),
(117, 7, 21, 33, 1, '2016-08-16 20:09:50', '2016-08-16 20:09:50'),
(118, 7, 21, 4, 1, '2016-08-16 20:10:06', '2016-08-16 20:10:15'),
(119, 7, 21, 34, 1, '2016-08-16 20:10:26', '2016-08-16 20:10:26'),
(120, 7, 22, 33, 1, '2016-08-16 20:11:23', '2016-08-16 20:11:23'),
(121, 7, 22, 35, 1, '2016-08-16 20:11:45', '2016-08-16 20:11:45'),
(122, 7, 22, 37, 1, '2016-08-16 20:11:54', '2016-08-16 20:11:54'),
(123, 7, 22, 42, 1, '2016-08-16 20:12:05', '2016-08-16 20:12:05'),
(124, 7, 22, 43, 1, '2016-08-16 20:12:19', '2016-08-16 20:12:19'),
(125, 7, 22, 39, 1, '2016-08-16 20:12:28', '2016-08-16 20:12:28'),
(126, 7, 22, 40, 1, '2016-08-16 20:12:40', '2016-08-16 20:12:40'),
(127, 7, 22, 36, 1, '2016-08-16 20:12:50', '2016-08-16 20:12:50'),
(128, 7, 22, 41, 1, '2016-08-16 20:12:59', '2016-08-16 20:12:59'),
(129, 7, 23, 12, 1, '2016-08-16 20:13:33', '2016-08-16 20:13:33'),
(130, 7, 23, 6, 1, '2016-08-16 20:13:42', '2016-08-16 20:13:42'),
(131, 7, 23, 10, 1, '2016-08-16 20:13:55', '2016-08-16 20:13:55'),
(132, 7, 23, 36, 1, '2016-08-16 20:14:06', '2016-08-16 20:14:06'),
(133, 7, 23, 35, 1, '2016-08-16 20:14:22', '2016-08-16 20:14:22'),
(134, 7, 23, 39, 1, '2016-08-16 20:14:32', '2016-08-16 20:14:32'),
(135, 7, 23, 40, 1, '2016-08-16 20:14:40', '2016-08-16 20:14:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_registers`
--

CREATE TABLE `ciam_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `information` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_relation_register`
--

CREATE TABLE `ciam_relation_register` (
  `id` int(10) UNSIGNED NOT NULL,
  `crops_type_id` int(10) UNSIGNED DEFAULT NULL,
  `crops_stage_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `register_id` int(10) UNSIGNED NOT NULL,
  `mezcla_medida` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciam_users`
--

CREATE TABLE `ciam_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_ciam_password_resets_table', 1),
('2016_07_07_101054_create_Ciam_Crops_Type_table', 1),
('2016_07_07_101417_create_Ciam_Categories_table', 1),
('2016_07_07_101539_create_Ciam_Products_table', 1),
('2016_07_07_101824_create_Ciam_Crops_Stage_table', 1),
('2016_07_07_102403_create_Ciam_Users_table', 1),
('2016_07_07_102633_create_Ciam_Departments_table', 1),
('2016_07_07_102822_create_Ciam_Registers_table', 1),
('2016_07_07_103459_create_Ciam_Relation_Register_table', 1),
('2016_07_07_104009_create_Ciam_Product_Type_Stage_table', 1),
('2016_07_07_104142_create_Ciam_Type_has_Stage_Crops_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juan Carlos Soto', 'juksoto@gmail.com', '$2y$10$8t2olyVIMgjoCtiDAtrVbuU3Z0V2D29nxNJ5KAHfg3UJ9OEKhgn1G', 1, 'GCPgZA5fpoXKo9fWrml5fjR6k4RsJHsJ7Z6mw4sFO6hE8RfM0yTb0D9LPt0n', '2016-08-16 16:05:18', '2016-08-16 19:28:55'),
(2, 'Juan Carlos ', 'juksotto@gmail.com', '$2y$10$9rgZSmuOPXugbrGm6TJwROUGevaFgLn21EJBts6eL63QWxfr/lB4C', 0, 'igDYETYKdFYnkwRfT15hUh2cXIPOF1KwoxEREcf0dTx69omyFDVeOtMS3opl', '2016-08-16 17:01:47', '2016-08-16 19:29:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciam_categories`
--
ALTER TABLE `ciam_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciam_crops_stage`
--
ALTER TABLE `ciam_crops_stage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciam_crops_stage_type_id_foreign` (`type_id`);

--
-- Indices de la tabla `ciam_crops_type`
--
ALTER TABLE `ciam_crops_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciam_departments`
--
ALTER TABLE `ciam_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciam_password_resets`
--
ALTER TABLE `ciam_password_resets`
  ADD KEY `ciam_password_resets_email_index` (`email`),
  ADD KEY `ciam_password_resets_token_index` (`token`);

--
-- Indices de la tabla `ciam_products`
--
ALTER TABLE `ciam_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciam_products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `ciam_product_type_stage`
--
ALTER TABLE `ciam_product_type_stage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciam_product_type_stage_crops_type_id_foreign` (`crops_type_id`),
  ADD KEY `ciam_product_type_stage_crops_stage_id_foreign` (`crops_stage_id`),
  ADD KEY `ciam_product_type_stage_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `ciam_registers`
--
ALTER TABLE `ciam_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciam_registers_department_id_foreign` (`department_id`),
  ADD KEY `ciam_registers_email_index` (`email`),
  ADD KEY `ciam_registers_name_index` (`name`);

--
-- Indices de la tabla `ciam_relation_register`
--
ALTER TABLE `ciam_relation_register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciam_relation_register_crops_type_id_foreign` (`crops_type_id`),
  ADD KEY `ciam_relation_register_crops_stage_id_foreign` (`crops_stage_id`),
  ADD KEY `ciam_relation_register_product_id_foreign` (`product_id`),
  ADD KEY `ciam_relation_register_register_id_foreign` (`register_id`);

--
-- Indices de la tabla `ciam_users`
--
ALTER TABLE `ciam_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ciam_users_email_unique` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciam_categories`
--
ALTER TABLE `ciam_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ciam_crops_stage`
--
ALTER TABLE `ciam_crops_stage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `ciam_crops_type`
--
ALTER TABLE `ciam_crops_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ciam_departments`
--
ALTER TABLE `ciam_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `ciam_products`
--
ALTER TABLE `ciam_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `ciam_product_type_stage`
--
ALTER TABLE `ciam_product_type_stage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT de la tabla `ciam_registers`
--
ALTER TABLE `ciam_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ciam_relation_register`
--
ALTER TABLE `ciam_relation_register`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ciam_users`
--
ALTER TABLE `ciam_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciam_crops_stage`
--
ALTER TABLE `ciam_crops_stage`
  ADD CONSTRAINT `ciam_crops_stage_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `ciam_crops_type` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ciam_products`
--
ALTER TABLE `ciam_products`
  ADD CONSTRAINT `ciam_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ciam_categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ciam_product_type_stage`
--
ALTER TABLE `ciam_product_type_stage`
  ADD CONSTRAINT `ciam_product_type_stage_crops_stage_id_foreign` FOREIGN KEY (`crops_stage_id`) REFERENCES `ciam_crops_stage` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciam_product_type_stage_crops_type_id_foreign` FOREIGN KEY (`crops_type_id`) REFERENCES `ciam_crops_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciam_product_type_stage_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `ciam_products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ciam_registers`
--
ALTER TABLE `ciam_registers`
  ADD CONSTRAINT `ciam_registers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `ciam_departments` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ciam_relation_register`
--
ALTER TABLE `ciam_relation_register`
  ADD CONSTRAINT `ciam_relation_register_crops_stage_id_foreign` FOREIGN KEY (`crops_stage_id`) REFERENCES `ciam_crops_stage` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciam_relation_register_crops_type_id_foreign` FOREIGN KEY (`crops_type_id`) REFERENCES `ciam_crops_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciam_relation_register_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `ciam_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciam_relation_register_register_id_foreign` FOREIGN KEY (`register_id`) REFERENCES `ciam_registers` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
