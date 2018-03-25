<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row_array();
    }

    public function set_news($id = FALSE)
    {
        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        if ($id === FALSE)
        {
            $this->db->insert('news', $data);
        }
        else
        {
            $this->db->where('id', $id);
            $this->db->update('news', $data);
        }
    }
}
?>