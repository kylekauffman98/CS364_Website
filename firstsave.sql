SELECT c.studentID, c.studentFN, c.studentLN, p1.programName, p2.programName, p3.programName
FROM 
	(SELECT `cadet`.studentID, `cadet`.studentFN, `cadet`.studentLN
	FROM `cadet`) c,
    
    ( SELECT `program`.programName 
		FROM `program` inner JOIN `tempSchedule`
        ON `tempSchedule`.period1programID1= `program`.programID
        WHERE `tempSchedule`.studentID = 1234567) p1,
       
	(SELECT `program`.programName 
	 	FROM `program` INNER JOIN `tempSchedule`
         ON `tempSchedule`.period2programID1 = `program`.programID
          WHERE `tempSchedule`.studentID = 1234567) p2,
         
	( SELECT `program`.programName 
	FROM `program` INNER JOIN `tempSchedule`
	ON `tempSchedule`.period3programID1 = `program`.programID
     WHERE `tempSchedule`.studentID = 1234567) p3,
    
    ( SELECT `tempSchedule`.studentID 
	FROM  `tempSchedule`
     WHERE `tempSchedule`.studentID = 1234567) temp
    
WHERE c.studentID = 1234567
AND c.studentID = temp.studentID;


	
    -- cadet.studentID, cadet.fn, cadet.ln, program1preference1.name
