<?php

/**
 * Copyright (C) 2012 Vizualizer All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    Naohisa Minagawa <info@vizualizer.jp>
 * @copyright Copyright (c) 2010, Vizualizer
 * @license http://www.apache.org/licenses/LICENSE-2.0.html Apache License, Version 2.0
 * @since PHP 5.3
 * @version   1.0.0
 */

/**
 * 注文のモデルです。
 *
 * @package VizualizerShop
 * @author Naohisa Minagawa <info@vizualizer.jp>
 */
class VizualizerShop_Model_Order extends VizualizerShop_Model_MallModel
{

    /**
     * コンストラクタ
     *
     * @param $values モデルに初期設定する値
     */
    public function __construct($values = array())
    {
        $loader = new Vizualizer_Plugin("shop");
        parent::__construct($loader->loadTable("Orders"), $values);
    }

    /**
     * 主キーでデータを取得する。
     *
     * @param $order_id 注文ID
     */
    public function findByPrimaryKey($order_id)
    {
        $this->findBy(array("order_id" => $order_id));
    }

    /**
     * 注文配送先情報を取得する
     */
    public function orderShips(){
        $loader = new Vizualizer_Plugin("shop");
        $model = $loader->loadModel("OrderShip");
        return $model->findAllBy(array("order_id" => $this->order_id));
    }

    /**
     * 注文配送先情報を取得する
     */
    public function orderShip(){
        $loader = new Vizualizer_Plugin("shop");
        $model = $loader->loadModel("OrderShip");
        $model->findBy(array("order_id" => $this->order_id));
        return $model;
    }
}
