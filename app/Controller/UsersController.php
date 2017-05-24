<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController{

    public $helpers = ['Html','Form','Flash'];
    public $components = ['Flash'];

    /*public function beforeFillter(){
        parent::beforeFilter();
        //$this->Auth->allow();
    }*/

    public function index(){
        //$this->autoLayout = false;
        $users_data = array();
       
        //変数をViewに渡す　このコントローラーからUserモデルに指定のレコードを取得する命令
        $users_data = $this->User->find('all');
        $this->set('users_data', $users_data);
        // app/View/Users/index.ctpを表示
        $this->render('index');
    }

    //public function done()
    public function delete(){
        $msg = sprintf(
            'User %s を削除しました。',
            $this->request->pass[0]
        );
        $this->redirect(['controller'=>'users','action'=>'login']);
        return;
    }

    public function create(){
        // POSTされた場合のみ処理を行う
        if($this->request->is('post')) {
            $this->User->create();
            // データを登録
            if($this->User->save($this->request->data)){
               $this->Flash->success(('登録成功'));
               return $this->redirect(['action'=>'index']);
            }else{
                $this->Flash->error(('登録失敗'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id=$id; 
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('This user has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update user.'));
        }else{
            $this->request->data = $this->User->findById($id);

           // unset($this->request->data['User']['password']);
        }

    /*$this->request->data = $this->User->read(null,$id);
    if($this->request->is('post') || $this->request->is('put')){*/
        

       /* if($this->User->save($this->request->data)){
                $this->Flash->success(__('更新完了'));
                return $this->redirect(array('action' => 'index'));*/
    }
        //$this->redirect('index');
    /*}else{
        $this->request->data=$this->User->read(null,$id);*/
}
