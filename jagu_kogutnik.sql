-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 12 Cze 2023, 21:23
-- Wersja serwera: 10.6.9-MariaDB-cll-lve
-- Wersja PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jagu_kogutnik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `guessnumber_rankings`
--

CREATE TABLE `guessnumber_rankings` (
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `guessnumber_rankings`
--

INSERT INTO `guessnumber_rankings` (`user_id`, `score`) VALUES
(1, 11),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 1),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hangman_rankings`
--

CREATE TABLE `hangman_rankings` (
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `hangman_rankings`
--

INSERT INTO `hangman_rankings` (`user_id`, `score`) VALUES
(1, 2),
(2, 1),
(3, 0),
(4, 0),
(5, 0),
(6, 2),
(7, 0),
(8, 0),
(9, 0),
(10, 2),
(11, 0),
(12, 0),
(13, 4),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ox_rankings`
--

CREATE TABLE `ox_rankings` (
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ox_rankings`
--

INSERT INTO `ox_rankings` (`user_id`, `score`) VALUES
(1, 8),
(2, 3),
(3, 0),
(4, 0),
(5, 0),
(6, 15),
(7, 0),
(8, 0),
(9, 0),
(10, 5),
(11, 0),
(12, 0),
(13, 1),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `question`
--

INSERT INTO `question` (`question_id`, `question`) VALUES
(1, 'zwierze'),
(2, 'ulubiona_potrawa'),
(3, 'ulubiony_kolor'),
(4, 'ulubiona_gra');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` char(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'default-pp.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `question_id`, `answer`, `avatar`) VALUES
(1, 'Borak123', '$2y$10$YEtsZZWF9ydghDFsQ9fdSOGwq4JCNgvO/g5zaarlocPdkVWS.sU8S', 1, 'Borak123', 'avatar_64875f37809b7.jpg'),
(2, 'gender123', '$2y$10$hDTPQ19QjPk6oixA7YUy1OqIkOw92pnFvaO0XTUKSTJ54WqWPb5fS', 1, 'gender123', 'avatar_6486d31a16f37.jpg'),
(5, 'cwel123cwel123', '$2y$10$tJYvd2AR/Cw3AX3ExL1ADecUV76JPkUeJ3YFW8VY/hMvtRIa1/c9q', 1, 'cwel123cwel123', 'default-pp.png'),
(6, 'danielek', '$2y$10$LhQhFdfFsxJvhFuGlNcAY.dqaBSeI0fVfcvuVVWzGb60a59gRab/u', 1, 'danielek', 'avatar_64870718b7e4d.gif'),
(7, 'warara', '$2y$10$NnkZ4WmrCci2R/dLgS8ehePERgJL4MSGR63OOICFzbVMyDak85HiW', 1, 'mini', 'default-pp.png'),
(8, 'gitteam', '$2y$10$yRdy9W2pseIwxXe0zUMtMe1rXmsHWnticy3EOIeY9lSQCxL0/kUG2', 1, 'aaaaaaaa', 'default-pp.png'),
(10, 'gitteam123', '$2y$10$GyXUHwXnsecm8l1Zhgv3BOb1/Yg9o8lQ9v39P4RfruLl.HV2eX5HK', 1, 'gitteam123', 'default-pp.png'),
(11, 'Jagu1', '$2y$10$9svmnWrT1fLJL/.JFeL7luBWOCTyAEAmA45LezBl.ImGfR/C0KB0S', 1, 'Spajki', 'avatar_648762a351eac.jpg'),
(12, 'asd', '$2y$10$Q7Q9uyuUDQPTtAVt7s1UaOZcqq/pn0AR4PppjpHguS6ErIlbEarn2', 1, 'asdasdasd', 'default-pp.png'),
(13, 'cyganelektryk', '$2y$10$/T0V3rghTZORdmNGZ7XFk.Wq3ZW1P24iujIb3IbDZOhP6Mxqfc/pa', 2, 'kebab', 'default-pp.png');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `guessnumber_rankings`
--
ALTER TABLE `guessnumber_rankings`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeksy dla tabeli `hangman_rankings`
--
ALTER TABLE `hangman_rankings`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeksy dla tabeli `ox_rankings`
--
ALTER TABLE `ox_rankings`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeksy dla tabeli `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`question_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `Relationship9` (`question_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `guessnumber_rankings`
--
ALTER TABLE `guessnumber_rankings`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `hangman_rankings`
--
ALTER TABLE `hangman_rankings`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `ox_rankings`
--
ALTER TABLE `ox_rankings`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Relationship9` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
