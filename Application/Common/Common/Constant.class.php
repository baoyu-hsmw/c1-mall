<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 16:34
 */

namespace Common\Common;


class Constant
{
    /**
     * 商品分类的变量名
     */
    const GOODS_CAT_ARG_NAME = 'cat';
    /**
     * 商品状态-上架
     */
    const GOODS_STATUS_ON = 0;
    /**
     * 商品状态-下架
     */
    const GOODS_STATUS_OFF = 1;
    /**
     * 已删除
     */
    const DELECTED = 1;
    /**
     * 未删除
     */
    const UNDELETED = 0;

    //0：等待支付（订单提交成功）；1：支付成功（待发货）；2：已发货（等待确认收货）；3：已确认收货（订单完成）；4：支付失败；5：取消订单

    /**
     * 等待支付（订单提交成功）
     */
    const ORDER_WAIT_FOR_PAY = 0;

    /**
     * 支付成功（待发货）
     */
    const ORDER_PAY_SUCCESS = 1;

    /**
     * 已发货（等待确认收货）
     */
    const ORDER_DELIVERED = 2;

    /**
     * 已确认收货（订单完成）
     */
    const ORDER_DONE = 3;

    /**
     * 支付失败
     */
    const ORDER_PAY_FAILED = 4;

    /**
     * 取消订单
     */
    const ORDER_CANCEL = 5;
}