<?php
if (!isset($_SESSION)) {
    session_start();
}
class OutrasFormacoesController
{
    public function inserir($inicio, $fim, $descricao, $idusuario)
    {
        require_once '../Model/OutrasFormacoes.php';
        $outrasFormacoes = new OutrasFormacoes();
        $outrasFormacoes->setInicio($inicio);
        $outrasFormacoes->setFim($fim);
        $outrasFormacoes->setDescricao($descricao);
        $outrasFormacoes->setIdUsuario($idusuario);
        $r = $outrasFormacoes->inserirBD();
        return $r;
    }

    public function remover($id)
    {
        require_once '../Model/OutrasFormacoes.php';
        $outrasFormacoes = new OutrasFormacoes();
        $r = $outrasFormacoes->excluirBD($id);
        return $r;
    }

    public function gerarLista($idusuario)
    {
        require_once '../Model/OutrasFormacoes.php';
        $outrasFormacoes = new OutrasFormacoes();
        return $results = $outrasFormacoes->listaOutrasFormacoes($idusuario);
    }
}
?>