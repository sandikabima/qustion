<?php
class Morning_model{
    private $table = 'morning_report';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMorning(){
        $this->db->query('select * from ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMorningById($id){
        $this->db->query('select * from ' . $this->table . ' where id=:id');
        $this->db->bind('id' , $id);
        return $this->db->single();
    }

    public function tambahDataMorning($data){

        $query = "insert into " .$this->table. " (tanggal,pimpinan,moderator,status) values (:tanggal, :pimpinan, :moderator, :status)";
        
        $this->db->query($query);
        $this->db->bind('tanggal',$data['tanggal']);
        $this->db->bind('pimpinan',$data['pimpinan']);
        $this->db->bind('moderator',$data['moderator']);
        $this->db->bind('status',$data['status']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMorning($id){
        $query = "delete from ".$this->table." where id=:id";
        $this->db->query($query);
        $this->db->bind('id' , $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMorning($data){

        $query = "update " .$this->table. " set tanggal = :tanggal , pimpinan = :pimpinan , moderator = :moderator, status = :status where id = :id";
        
        $this->db->query($query);
        $this->db->bind('id' , $data['id']);
        $this->db->bind('tanggal',$data['tanggal']);
        $this->db->bind('pimpinan',$data['pimpinan']);
        $this->db->bind('moderator',$data['moderator']);
        $this->db->bind('status',$data['status']);
        
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataMorning(){
        $keyword = $_POST['keyword'];
        $query = "select * from ".$this->table." where tanggal like :keyword";
        $this->db->query($query);
        $this->db->bind('keyword' , "%$keyword%");
        return $this->db->resultSet();
    }
}