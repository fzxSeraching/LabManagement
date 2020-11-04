<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-04
 * Time: 17:46
 */

/**
 * @OA\Info(
 *     description="实验室管理信息系统",
 *     version="1.0.0",
 *     title="实验室管理信息系统",
 *     @OA\Contact(
 *         email="fzxseraching@163.com"
 *     )
 * )
 * @OA\Tag(
 *     name="Admin",
 *     description="后台管理",
 * )
 * */

//模板
/**
 * @OA\Get(
 *     path="/CheckCloth/inf_list",
 *     tags={"CheckCloth"},
 *     summary="列出数据",
 *     description="待验布列表接口,默认显示所有的数据，根据条件的不同进行搜索",
 *     operationId="inf_list",
 *     @OA\Parameter(
 *         name="roid",
 *         in="query",
 *         description="收料单号",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="page_num",
 *         in="query",
 *         description="页码",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="page_count",
 *         in="query",
 *         description="当前页面显示的数据量",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="mmfname",
 *         in="query",
 *         description="物料名字",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="mmfcode",
 *         in="query",
 *         description="物料编号",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="providername",
 *         in="query",
 *         description="供应商名字",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="mpsid",
 *         in="query",
 *         description="制单号",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="state",
 *         in="query",
 *         description="状态：1：待验布；2：已验布；默认所有",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *      @OA\Response(
 *         response="200",
 *         description="返回结果的data是一个Json数组，如：[{...},{...}]",
 *         @OA\JsonContent(
 *             type="object",
 *             example={
 *                 "code":"返回码：200成功、400失败",
 *                 "msg":"返回消息",
 *                 "info":{
 *                  "all": "所有数量",
 *                  "alreadycheck": "已验布的数量",
 *                  "uncheck": "未验布的数量",
 *                  {
 *                     "MPSName":"款名",
 *                     "MPSCode":"款号",
 *                     "Name":"物料名字",
 *                     "PicturePath":"图片路径",
 *                     "Color":"颜色",
 *                     "ColorID":"颜色ID",
 *                     "MPSID":"制单号",
 *                     "ROID":"收料单号",
 *                     "Model":"合同门幅",
 *                     "POID":"采购单号",
 *                     "FGWeight":"克重",
 *                     "MultQty":"数量",
 *                     "MultUnit":"单位",
 *                     "Code":"款号",
 *                     "BatchNO":"缸号",
 *                     "FillDate":"收料时间",
 *                     "UsedDate":"消耗时间",
 *                     "ShortName":"供应商名字",
 *                     "MatBarCodeNum":"匹/卷数",
 *                     "QCID":"检验单号",
 *                     "CheckState":"检验状态，已审核，未审核",
 *                     "SamplState":"及格状态，及格/不及格"
 *                 }
 *                      }
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="查找失败"
 *     )
 * )
 */
