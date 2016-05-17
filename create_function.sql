CREATE DEFINER=`root`@`localhost` FUNCTION `f_getNextID`(cur_id int) RETURNS int(11)
begin
	declare next_id int;
	if(cur_id >= all (select so_pm from Phieu_mua_ts)) then

		set next_id = -1;
	else 
		set next_id = cur_id + 1;
		
		going_next: WHILE next_id not in (select so_pm from Phieu_mua_ts) DO
			SET next_id = next_id + 1;
		END WHILE going_next;
	end if;
RETURN next_id;
END


CREATE DEFINER=`root`@`localhost` FUNCTION `f_getPrevID`(cur_id int) RETURNS int(11)
begin
	declare prev_id int;
	if(cur_id <= all (select so_pm from Phieu_mua_ts)) then

		set prev_id = -1;
	else 
		set prev_id = cur_id - 1;
		
		going_next: WHILE next_id not in (select so_pm from Phieu_mua_ts) DO
			SET prev_id = prev_id - 1;
		END WHILE going_next;
	end if;
RETURN prev_id;
END


CREATE DEFINER=`root`@`localhost` FUNCTION `f_getNewSmallestID`() RETURNS int(11)
BEGIN
	declare id int;
	set id = 1;
	going_next: WHILE id in (select so_pm from Phieu_mua_ts) DO
		SET id = id + 1;
	END WHILE going_next;
return id;
END
