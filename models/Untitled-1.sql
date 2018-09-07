select * from fw_backend_person  JOIN fw_backend_pseudos
UNION
select * from fw_backend_pseudos  JOIN fw_backend_person
 