<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2018/3/26
 * Time: 17:37
 */

namespace enum;

// 状态值说明
class StatusEnum
{
    // 正常状态
    const NORMAL = 1;

    // 审核不通过
    const NOT_PASS = 0;

    // 已删除
    const DELETED = -1;
}