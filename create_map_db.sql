--
-- Tabela: map_db
-- Descrição: Armazena informações sobre os mapas do Ragnarok Online
--

CREATE TABLE IF NOT EXISTS `map_db` (
  `map` varchar(50) NOT NULL DEFAULT '',
  `map_name` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`map`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dados para map_db
-- Mapas principais e secundários do Ragnarok Online
--

INSERT INTO `map_db` (`map`, `map_name`, `type`) VALUES
-- Cidades Principais
('prontera', 'Prontera', 'city'),
('izlude', 'Izlude', 'city'),
('geffen', 'Geffen', 'city'),
('morocc', 'Morroc', 'city'),
('payon', 'Payon', 'city'),
('alberta', 'Alberta', 'city'),
('aldebaran', 'Al De Baran', 'city'),
('comodo', 'Comodo', 'city'),
('yuno', 'Juno', 'city'),
('amatsu', 'Amatsu', 'city'),
('gonryun', 'Kunlun', 'city'),
('umbala', 'Umbala', 'city'),
('niflheim', 'Niflheim', 'city'),
('louyang', 'Louyang', 'city'),
('ayothaya', 'Ayothaya', 'city'),
('einbroch', 'Einbroch', 'city'),
('einbech', 'Einbech', 'city'),
('lighthalzen', 'Lighthalzen', 'city'),
('hugel', 'Hugel', 'city'),
('rachel', 'Rachel', 'city'),
('veins', 'Veins', 'city'),
('moscovia', 'Moscovia', 'city'),
('brasilis', 'Brasilis', 'city'),
('dewata', 'Dewata', 'city'),
('malangdo', 'Malangdo', 'city'),
('malaya', 'Malaya', 'city'),
('dicastes01', 'El Dicastes', 'city'),
('mora', 'Mora', 'city'),

-- Campos de Prontera
('prt_fild00', 'Campo de Prontera 00', 'field'),
('prt_fild01', 'Campo de Prontera 01', 'field'),
('prt_fild02', 'Campo de Prontera 02', 'field'),
('prt_fild03', 'Campo de Prontera 03', 'field'),
('prt_fild04', 'Campo de Prontera 04', 'field'),
('prt_fild05', 'Campo de Prontera 05', 'field'),
('prt_fild06', 'Campo de Prontera 06', 'field'),
('prt_fild07', 'Campo de Prontera 07', 'field'),
('prt_fild08', 'Campo de Prontera 08', 'field'),
('prt_fild09', 'Campo de Prontera 09', 'field'),
('prt_fild10', 'Campo de Prontera 10', 'field'),
('prt_fild11', 'Campo de Prontera 11', 'field'),

-- Campos de Geffen
('gef_fild00', 'Campo de Geffen 00', 'field'),
('gef_fild01', 'Campo de Geffen 01', 'field'),
('gef_fild02', 'Campo de Geffen 02', 'field'),
('gef_fild03', 'Campo de Geffen 03', 'field'),
('gef_fild04', 'Campo de Geffen 04', 'field'),
('gef_fild05', 'Campo de Geffen 05', 'field'),
('gef_fild06', 'Campo de Geffen 06', 'field'),
('gef_fild07', 'Campo de Geffen 07', 'field'),
('gef_fild08', 'Campo de Geffen 08', 'field'),
('gef_fild09', 'Campo de Geffen 09', 'field'),
('gef_fild10', 'Campo de Geffen 10', 'field'),
('gef_fild11', 'Campo de Geffen 11', 'field'),
('gef_fild12', 'Campo de Geffen 12', 'field'),
('gef_fild13', 'Campo de Geffen 13', 'field'),
('gef_fild14', 'Campo de Geffen 14', 'field'),

-- Campos de Payon
('pay_fild01', 'Campo de Payon 01', 'field'),
('pay_fild02', 'Campo de Payon 02', 'field'),
('pay_fild03', 'Campo de Payon 03', 'field'),
('pay_fild04', 'Campo de Payon 04', 'field'),
('pay_fild05', 'Campo de Payon 05', 'field'),
('pay_fild06', 'Campo de Payon 06', 'field'),
('pay_fild07', 'Campo de Payon 07', 'field'),
('pay_fild08', 'Campo de Payon 08', 'field'),
('pay_fild09', 'Campo de Payon 09', 'field'),
('pay_fild10', 'Campo de Payon 10', 'field'),
('pay_fild11', 'Campo de Payon 11', 'field'),

-- Campos de Morroc
('moc_fild01', 'Campo de Morroc 01', 'field'),
('moc_fild02', 'Campo de Morroc 02', 'field'),
('moc_fild03', 'Campo de Morroc 03', 'field'),
('moc_fild04', 'Campo de Morroc 04', 'field'),
('moc_fild05', 'Campo de Morroc 05', 'field'),
('moc_fild06', 'Campo de Morroc 06', 'field'),
('moc_fild07', 'Campo de Morroc 07', 'field'),
('moc_fild08', 'Campo de Morroc 08', 'field'),
('moc_fild09', 'Campo de Morroc 09', 'field'),
('moc_fild10', 'Campo de Morroc 10', 'field'),
('moc_fild11', 'Campo de Morroc 11', 'field'),
('moc_fild12', 'Campo de Morroc 12', 'field'),
('moc_fild13', 'Campo de Morroc 13', 'field'),
('moc_fild14', 'Campo de Morroc 14', 'field'),
('moc_fild15', 'Campo de Morroc 15', 'field'),
('moc_fild16', 'Campo de Morroc 16', 'field'),
('moc_fild17', 'Campo de Morroc 17', 'field'),
('moc_fild18', 'Campo de Morroc 18', 'field'),
('moc_fild19', 'Campo de Morroc 19', 'field'),

-- Masmorras de Prontera
('prt_sewb1', 'Esgoto de Prontera B1', 'dungeon'),
('prt_sewb2', 'Esgoto de Prontera B2', 'dungeon'),
('prt_sewb3', 'Esgoto de Prontera B3', 'dungeon'),
('prt_sewb4', 'Esgoto de Prontera B4', 'dungeon'),

-- Caverna Orc
('gef_dun00', 'Caverna Orc 1', 'dungeon'),
('gef_dun01', 'Caverna Orc 2', 'dungeon'),
('gef_dun02', 'Torre de Geffen 1', 'dungeon'),
('gef_dun03', 'Torre de Geffen 2', 'dungeon'),

-- Torre Sem Fim
('alde_dun01', 'Torre Sem Fim 1', 'dungeon'),
('alde_dun02', 'Torre Sem Fim 2', 'dungeon'),
('alde_dun03', 'Torre Sem Fim 3', 'dungeon'),
('alde_dun04', 'Torre Sem Fim 4', 'dungeon'),

-- Caverna de Payon
('pay_dun00', 'Caverna de Payon 1', 'dungeon'),
('pay_dun01', 'Caverna de Payon 2', 'dungeon'),
('pay_dun02', 'Caverna de Payon 3', 'dungeon'),
('pay_dun03', 'Caverna de Payon 4', 'dungeon'),
('pay_dun04', 'Caverna de Payon 5', 'dungeon'),

-- Pirâmide
('moc_pryd01', 'Pirâmide 1', 'dungeon'),
('moc_pryd02', 'Pirâmide 2', 'dungeon'),
('moc_pryd03', 'Pirâmide 3', 'dungeon'),
('moc_pryd04', 'Pirâmide 4', 'dungeon'),
('moc_pryd05', 'Pirâmide 5', 'dungeon'),
('moc_pryd06', 'Pirâmide 6', 'dungeon'),

-- Esfinge
('in_sphinx1', 'Esfinge 1', 'dungeon'),
('in_sphinx2', 'Esfinge 2', 'dungeon'),
('in_sphinx3', 'Esfinge 3', 'dungeon'),
('in_sphinx4', 'Esfinge 4', 'dungeon'),
('in_sphinx5', 'Esfinge 5', 'dungeon'),

-- Mar Afogado
('treasure01', 'Mar Afogado 1', 'dungeon'),
('treasure02', 'Mar Afogado 2', 'dungeon'),

-- Navio Fantasma
('mag_dun01', 'Navio Fantasma 1', 'dungeon'),
('mag_dun02', 'Navio Fantasma 2', 'dungeon'),

-- Caverna de Alberta
('tur_dun01', 'Caverna de Alberta 1', 'dungeon'),
('tur_dun02', 'Caverna de Alberta 2', 'dungeon'),
('tur_dun03', 'Caverna de Alberta 3', 'dungeon'),
('tur_dun04', 'Caverna de Alberta 4', 'dungeon'),

-- Cavernas de Glast Heim
('glast_01', 'Glast Heim 1', 'dungeon'),
('gl_cas01', 'Glast Heim Castelo 1', 'dungeon'),
('gl_cas02', 'Glast Heim Castelo 2', 'dungeon'),
('gl_church', 'Glast Heim Igreja', 'dungeon'),
('gl_chyard', 'Glast Heim Cemitério', 'dungeon'),
('gl_dun01', 'Glast Heim Calabouço 1', 'dungeon'),
('gl_dun02', 'Glast Heim Calabouço 2', 'dungeon'),
('gl_in01', 'Glast Heim Interior', 'dungeon'),
('gl_knt01', 'Glast Heim Cavaleiros 1', 'dungeon'),
('gl_knt02', 'Glast Heim Cavaleiros 2', 'dungeon'),
('gl_prison', 'Glast Heim Prisão', 'dungeon'),
('gl_prison1', 'Glast Heim Prisão 1', 'dungeon'),
('gl_sew01', 'Glast Heim Esgoto 1', 'dungeon'),
('gl_sew02', 'Glast Heim Esgoto 2', 'dungeon'),
('gl_sew03', 'Glast Heim Esgoto 3', 'dungeon'),
('gl_sew04', 'Glast Heim Esgoto 4', 'dungeon'),
('gl_step', 'Glast Heim Escadas', 'dungeon'),

-- Juno
('jupe_area1', 'Juperos 1', 'dungeon'),
('jupe_area2', 'Juperos 2', 'dungeon'),
('jupe_cave', 'Juperos Caverna', 'dungeon'),
('jupe_core', 'Juperos Centro', 'dungeon'),
('jupe_ele', 'Juperos Elevador', 'dungeon'),
('jupe_ele_r', 'Juperos Elevador Ruins', 'dungeon'),
('jupe_gate', 'Juperos Portão', 'dungeon'),

-- Clock Tower
('c_tower1', 'Torre do Relógio B1', 'dungeon'),
('c_tower2', 'Torre do Relógio B2', 'dungeon'),
('c_tower3', 'Torre do Relógio B3', 'dungeon'),
('c_tower4', 'Torre do Relógio B4', 'dungeon'),

-- Thanatos Tower
('tha_t01', 'Torre Thanatos 1', 'dungeon'),
('tha_t02', 'Torre Thanatos 2', 'dungeon'),
('tha_t03', 'Torre Thanatos 3', 'dungeon'),
('tha_t04', 'Torre Thanatos 4', 'dungeon'),
('tha_t05', 'Torre Thanatos 5', 'dungeon'),
('tha_t06', 'Torre Thanatos 6', 'dungeon'),
('tha_t07', 'Torre Thanatos 7', 'dungeon'),
('tha_t08', 'Torre Thanatos 8', 'dungeon'),
('tha_t09', 'Torre Thanatos 9', 'dungeon'),
('tha_t10', 'Torre Thanatos 10', 'dungeon'),
('tha_t11', 'Torre Thanatos 11', 'dungeon'),
('tha_t12', 'Torre Thanatos 12', 'dungeon'),
('thana_boss', 'Torre Thanatos Boss', 'dungeon'),

-- PvP
('pvp_y_room', 'Sala PvP', 'pvp'),
('pvp_y_1-1', 'PvP Rookie 1-1', 'pvp'),
('pvp_y_1-2', 'PvP Rookie 1-2', 'pvp'),
('pvp_y_1-3', 'PvP Rookie 1-3', 'pvp'),
('pvp_y_1-4', 'PvP Rookie 1-4', 'pvp'),
('pvp_y_1-5', 'PvP Rookie 1-5', 'pvp'),
('pvp_y_2-1', 'PvP Expert 2-1', 'pvp'),
('pvp_y_2-2', 'PvP Expert 2-2', 'pvp'),
('pvp_y_2-3', 'PvP Expert 2-3', 'pvp'),
('pvp_y_2-4', 'PvP Expert 2-4', 'pvp'),
('pvp_y_2-5', 'PvP Expert 2-5', 'pvp'),

-- Castelos de Guildas
('prtg_cas01', 'Castelo Prontera 1', 'guild'),
('prtg_cas02', 'Castelo Prontera 2', 'guild'),
('prtg_cas03', 'Castelo Prontera 3', 'guild'),
('prtg_cas04', 'Castelo Prontera 4', 'guild'),
('prtg_cas05', 'Castelo Prontera 5', 'guild'),
('payg_cas01', 'Castelo Payon 1', 'guild'),
('payg_cas02', 'Castelo Payon 2', 'guild'),
('payg_cas03', 'Castelo Payon 3', 'guild'),
('payg_cas04', 'Castelo Payon 4', 'guild'),
('payg_cas05', 'Castelo Payon 5', 'guild'),
('gefg_cas01', 'Castelo Geffen 1', 'guild'),
('gefg_cas02', 'Castelo Geffen 2', 'guild'),
('gefg_cas03', 'Castelo Geffen 3', 'guild'),
('gefg_cas04', 'Castelo Geffen 4', 'guild'),
('gefg_cas05', 'Castelo Geffen 5', 'guild'),
('aldeg_cas01', 'Castelo Al De Baran 1', 'guild'),
('aldeg_cas02', 'Castelo Al De Baran 2', 'guild'),
('aldeg_cas03', 'Castelo Al De Baran 3', 'guild'),
('aldeg_cas04', 'Castelo Al De Baran 4', 'guild'),
('aldeg_cas05', 'Castelo Al De Baran 5', 'guild'),

-- Especiais
('new_1-1', 'Zona de Treino 1', 'training'),
('new_1-2', 'Zona de Treino 2', 'training'),
('new_1-3', 'Zona de Treino 3', 'training'),
('new_1-4', 'Zona de Treino 4', 'training'),
('new_2-1', 'Zona de Treino Avançada 1', 'training'),
('new_2-2', 'Zona de Treino Avançada 2', 'training'),
('new_2-3', 'Zona de Treino Avançada 3', 'training'),
('new_2-4', 'Zona de Treino Avançada 4', 'training'),

-- Abyss Lake
('abyss_01', 'Lago do Abismo 1', 'dungeon'),
('abyss_02', 'Lago do Abismo 2', 'dungeon'),
('abyss_03', 'Lago do Abismo 3', 'dungeon'),

-- Ant Hell
('anthell01', 'Formigueiro 1', 'dungeon'),
('anthell02', 'Formigueiro 2', 'dungeon'),

-- Beach Dungeon
('beach_dun', 'Praia Masmorra 1', 'dungeon'),
('beach_dun2', 'Praia Masmorra 2', 'dungeon'),
('beach_dun3', 'Praia Masmorra 3', 'dungeon'),

-- Toy Factory
('xmas_dun01', 'Fábrica de Brinquedos 1', 'dungeon'),
('xmas_dun02', 'Fábrica de Brinquedos 2', 'dungeon'),

-- Comodo
('cmd_fild01', 'Campo de Comodo 01', 'field'),
('cmd_fild02', 'Campo de Comodo 02', 'field'),
('cmd_fild03', 'Campo de Comodo 03', 'field'),
('cmd_fild04', 'Campo de Comodo 04', 'field'),
('cmd_fild05', 'Campo de Comodo 05', 'field'),
('cmd_fild06', 'Campo de Comodo 06', 'field'),
('cmd_fild07', 'Campo de Comodo 07', 'field'),
('cmd_fild08', 'Campo de Comodo 08', 'field'),
('cmd_fild09', 'Campo de Comodo 09', 'field'),

-- Rachel
('ra_fild01', 'Campo de Rachel 01', 'field'),
('ra_fild02', 'Campo de Rachel 02', 'field'),
('ra_fild03', 'Campo de Rachel 03', 'field'),
('ra_fild04', 'Campo de Rachel 04', 'field'),
('ra_fild05', 'Campo de Rachel 05', 'field'),
('ra_fild06', 'Campo de Rachel 06', 'field'),
('ra_fild07', 'Campo de Rachel 07', 'field'),
('ra_fild08', 'Campo de Rachel 08', 'field'),
('ra_fild09', 'Campo de Rachel 09', 'field'),
('ra_fild10', 'Campo de Rachel 10', 'field'),
('ra_fild11', 'Campo de Rachel 11', 'field'),
('ra_fild12', 'Campo de Rachel 12', 'field'),
('ra_fild13', 'Campo de Rachel 13', 'field'),

-- Veins
('ve_fild01', 'Campo de Veins 01', 'field'),
('ve_fild02', 'Campo de Veins 02', 'field'),
('ve_fild03', 'Campo de Veins 03', 'field'),
('ve_fild04', 'Campo de Veins 04', 'field'),
('ve_fild05', 'Campo de Veins 05', 'field'),
('ve_fild06', 'Campo de Veins 06', 'field'),
('ve_fild07', 'Campo de Veins 07', 'field');
