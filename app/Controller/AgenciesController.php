<?php
class AgenciesController extends AppController{
    public function index(){
        $agencies_data = array();

        $agencies_data = $this->Agency->find('all');
            $this->set('agencies_data', $agencies_data);
            // app/View/Agenciess/index.ctpを表示
            $this->render('index');
    }

//public function done()
    public function delete(){
        $msg = sprintf(
            '代理店 %s を削除しました。',
            $this->request->pass[0]
        );

        $this->redirect(['controller'=>'agencies','action'=>'index']);
        return;
    }

    public function create(){
        // POSTされた場合のみ処理を行う
        if($this->request->is('post')) {
            $this->Agency->create();
            // データを登録
            if($this->Agency->save($this->request->data)){
               $this->Flash->success(('登録成功'));
               return $this->redirect(['action'=>'login']);
            }else{
                $this->Flash->error(('登録失敗'));
            }
        }
        }
    

    public function edit($id = null) {
        $this->Agency->id=$id; 
        if (!$this->Agency->exists()) {
            throw new NotFoundException(__('Invalid agency'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Agency->save($this->request->data)) {
                $this->Flash->success(__('This agency has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update agency.'));
        }else{
            $this->request->data = $this->Agency->findById($id);
        }
    }
    

    
}

?>