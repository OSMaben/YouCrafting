

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `firstName` varchar(225) DEFAULT NULL,
  `lastName` varchar(225) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `CIN` varchar(225) DEFAULT NULL,
  `id_role` int DEFAULT NULL
) ENGINE=InnoDB 



CREATE TABLE `articles` (
  `ID_Articles` int NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `contenu` varchar(225) DEFAULT NULL,
  `date_de_creation` date DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL
) ENGINE=InnoDB 


INSERT INTO `articles` (`ID_Articles`, `title`, `contenu`, `date_de_creation`, `id_utilisateur`) VALUES
(1, 'How to Train Your Dragon', 'A comprehensive guide to the movie and its characters', '2022-02-22', 1),
(3, 'The History of Wizarding Schools', 'A look at the origins and evolution of wizarding schools in the Harry Potter universe', '2022-04-01', 1),
(4, 'The Art of Divination in Fantasy', 'An examination of the role of divination in fantasy fiction and its significance in the genre', '2022-05-01', 1),
(5, 'The Mythology of Dragons', 'A study of the mythological origins and cultural significance of dragons in literature and folklore', '2022-06-01', 1),
(12, 'TARGUI ALO', 'ALO LASBA\r\n', '2022-05-01', 1);



CREATE TABLE `role` (
  `ID_role` int NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL
) ENGINE=InnoDB 



CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL,
  `firstName` varchar(225) DEFAULT NULL,
  `lastName` varchar(225) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `id_role` int DEFAULT NULL
) ENGINE=InnoDB 

INSERT INTO `utilisateur` (`id_utilisateur`, `firstName`, `lastName`, `username`, `password`, `email`, `id_role`) VALUES
(1, 'oussama', 'ben mazzo', 'osm', '123', 'oussama@gmail.com', NULL);


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_role` (`id_role`);


ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_Articles`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);


ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_role`);


ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `id_role` (`id_role`);


ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_Articles` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_role` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`ID_role`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`ID_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
