<?php
	require "../includes/connection.php";

	$sql = "select p.cod_prod,
                  p.nome,
                  sum(iv.quantidade) as qtdevendida
             from venda v
            inner join itemVenda iv
               on v.cod_venda = iv.cod_venda
            inner join produto p
               on p.cod_prod = iv.cod_prod 
            group by p.cod_prod,
                  p.nome
            order by p.nome ";

	$res = pg_query($connect, $sql);
	$qtde=pg_num_rows($res);	 
?>