<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "DOCUMENTOS_PAGO".
 *
 * @property integer $SEQ_DCPG_CDG
 * @property integer $EMPR_CDG
 * @property integer $DCPG_CRR_INTERNO
 * @property integer $CLPP_CDG
 * @property integer $TPDC_CDG
 * @property integer $LBRS_CDG
 * @property string $DCPG_FCH_INGRESO
 * @property string $DCPG_FCH_RECEPCION
 * @property integer $DCPG_FOL_DOCTO
 * @property integer $PRSH_CDG_PERS
 * @property integer $PRSH_DV_PERS
 * @property string $DCPG_NMR_CONTRATO
 * @property integer $TTPG_CDG
 * @property string $DCPG_FCH_EMISION
 * @property string $DCPG_FCH_PAGO
 * @property string $DCPG_MTV_EMISION
 * @property integer $TPMN_CDG
 * @property double $DCPG_TIP_CAMBIO
 * @property double $DCPG_VLR_ORIGINAL
 * @property double $DCPG_VLR_PESOS
 * @property double $DCPG_VLR_AFECTO
 * @property double $DCPG_VLR_EXENTO
 * @property integer $DCPG_TIP_CTL_IVA
 * @property double $DCPG_VLR_IVA
 * @property integer $TPIM_CDG_1
 * @property double $DCPG_VLR_IMPUESTO_1
 * @property integer $TPIM_CDG_2
 * @property double $DCPG_VLR_IMPUESTO_2
 * @property integer $TPRT_CDG
 * @property double $DCPG_VLR_RETENCION
 * @property double $DCPG_TTL_PAGO
 * @property integer $EADC_CDG
 * @property string $DCPG_FCH_AUTORIZACION
 * @property string $DCPG_MTV_RECHAZO
 * @property integer $ESCN_CDG
 * @property string $DCPG_FCH_ULT_PAGO
 * @property double $DCPG_TTL_APLC_CPAGOS
 * @property double $DCPG_TTL_APLC_VENTAS
 * @property double $DCPG_TTL_NOTA_CREDITO
 * @property double $DCPG_VLR_PAGADOS_PESOS
 * @property double $DCPG_SLD_ACTUAL_PESOS
 * @property double $DCPG_VLR_PAGADOS_ORIG
 * @property double $DCPG_SLD_ACTUAL_ORIG
 * @property double $DCPG_DIF_CAMBIO
 * @property integer $UNCP_CDG
 * @property integer $OFTS_CDG
 * @property integer $USRS_USERNAME
 * @property string $DCPG_CDG_ESTADO
 * @property integer $DCPG_CDG_INGRESO
 * @property integer $SEQ_TRCN_CDG
 * @property string $DCPG_TIP_INGRESO
 * @property string $DCPG_PERIODO_CTB
 * @property integer $SEQ_DCPG_CDG_REF
 * @property integer $TPMN_CDG_PAGO
 * @property string $DCPG_TIP_IVA
 * @property double $DCPG_VLR_IVA_AFIJO
 * @property integer $CNBN_CDG
 * @property string $DCPG_GLS_AUX
 * @property integer $SEQ_PRIF_CDG
 * @property string $DCPG_TPO_AJUSTE
 * @property string $DCPG_TPO_DOCUMENTO
 * @property string $DCPG_TPO_CREDITO_TRIB
 * @property integer $DCPG_IVA_CDG
 * @property integer $SEQ_DCPG_CDG_DONC
 * @property integer $SEQ_DCPG_CDG_REF2
 * @property double $DCPG_VLR_O_RETENCION
 * @property double $DCPG_MNT_BASE_ICE
 * @property integer $DCPG_CDG_ICE
 * @property double $DCPG_BASE_IMP_RENTA
 * @property double $DCPG_VLR_ICE
 * @property integer $DCVP_NMR_CONTRATO
 * @property integer $SEQ_CTPS_CDG
 * @property integer $CTPS_FOLIO
 * @property string $CNFC_CDG
 * @property string $DCPG_INTERFASE_LOTUS
 * @property double $DCPG_BASE_EXENT_RENTA
 * @property integer $ESIN_CDG
 * @property double $DCPG_NO_OBJETO_IVA
 * @property integer $DCPG_COD_ESTABLEC
 * @property string $DCPG_PTO_EMISION
 * @property string $DCPG_SRI_AUTORIZACION
 * @property string $DCPG_DOC_ELECTRONICO
 */
class DOCUMENTOSPAGO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DOCUMENTOS_PAGO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SEQ_DCPG_CDG', 'EMPR_CDG', 'DCPG_CRR_INTERNO', 'CLPP_CDG', 'TPDC_CDG', 'LBRS_CDG', 'DCPG_FCH_INGRESO', 'DCPG_FCH_RECEPCION', 'DCPG_FOL_DOCTO', 'PRSH_CDG_PERS', 'PRSH_DV_PERS', 'TTPG_CDG', 'DCPG_FCH_EMISION', 'DCPG_FCH_PAGO', 'TPMN_CDG', 'DCPG_TIP_CAMBIO', 'DCPG_VLR_ORIGINAL', 'DCPG_VLR_PESOS', 'DCPG_TIP_CTL_IVA', 'DCPG_TTL_PAGO', 'EADC_CDG', 'ESCN_CDG', 'DCPG_TTL_APLC_CPAGOS', 'DCPG_TTL_APLC_VENTAS', 'DCPG_TTL_NOTA_CREDITO', 'DCPG_VLR_PAGADOS_PESOS', 'DCPG_SLD_ACTUAL_PESOS', 'DCPG_VLR_PAGADOS_ORIG', 'DCPG_SLD_ACTUAL_ORIG', 'DCPG_DIF_CAMBIO', 'UNCP_CDG', 'OFTS_CDG', 'USRS_USERNAME', 'DCPG_CDG_ESTADO', 'DCPG_CDG_INGRESO', 'DCPG_TIP_INGRESO', 'DCPG_PERIODO_CTB', 'SEQ_DCPG_CDG_REF', 'TPMN_CDG_PAGO'], 'required'],
            [['SEQ_DCPG_CDG', 'EMPR_CDG', 'DCPG_CRR_INTERNO', 'CLPP_CDG', 'TPDC_CDG', 'LBRS_CDG', 'DCPG_FOL_DOCTO', 'PRSH_CDG_PERS', 'PRSH_DV_PERS', 'TTPG_CDG', 'TPMN_CDG', 'DCPG_TIP_CTL_IVA', 'TPIM_CDG_1', 'TPIM_CDG_2', 'TPRT_CDG', 'EADC_CDG', 'ESCN_CDG', 'UNCP_CDG', 'OFTS_CDG', 'USRS_USERNAME', 'DCPG_CDG_INGRESO', 'SEQ_TRCN_CDG', 'SEQ_DCPG_CDG_REF', 'TPMN_CDG_PAGO', 'CNBN_CDG', 'SEQ_PRIF_CDG', 'DCPG_IVA_CDG', 'SEQ_DCPG_CDG_DONC', 'SEQ_DCPG_CDG_REF2', 'DCPG_CDG_ICE', 'DCVP_NMR_CONTRATO', 'SEQ_CTPS_CDG', 'CTPS_FOLIO', 'ESIN_CDG', 'DCPG_COD_ESTABLEC'], 'integer'],
            [['DCPG_FCH_INGRESO', 'DCPG_FCH_RECEPCION', 'DCPG_FCH_EMISION', 'DCPG_FCH_PAGO', 'DCPG_FCH_AUTORIZACION', 'DCPG_FCH_ULT_PAGO', 'DCPG_PERIODO_CTB'], 'safe'],
            [['DCPG_TIP_CAMBIO', 'DCPG_VLR_ORIGINAL', 'DCPG_VLR_PESOS', 'DCPG_VLR_AFECTO', 'DCPG_VLR_EXENTO', 'DCPG_VLR_IVA', 'DCPG_VLR_IMPUESTO_1', 'DCPG_VLR_IMPUESTO_2', 'DCPG_VLR_RETENCION', 'DCPG_TTL_PAGO', 'DCPG_TTL_APLC_CPAGOS', 'DCPG_TTL_APLC_VENTAS', 'DCPG_TTL_NOTA_CREDITO', 'DCPG_VLR_PAGADOS_PESOS', 'DCPG_SLD_ACTUAL_PESOS', 'DCPG_VLR_PAGADOS_ORIG', 'DCPG_SLD_ACTUAL_ORIG', 'DCPG_DIF_CAMBIO', 'DCPG_VLR_IVA_AFIJO', 'DCPG_VLR_O_RETENCION', 'DCPG_MNT_BASE_ICE', 'DCPG_BASE_IMP_RENTA', 'DCPG_VLR_ICE', 'DCPG_BASE_EXENT_RENTA', 'DCPG_NO_OBJETO_IVA'], 'number'],
            [['DCPG_NMR_CONTRATO', 'CNFC_CDG'], 'string', 'max' => 12],
            [['DCPG_MTV_EMISION', 'DCPG_MTV_RECHAZO'], 'string', 'max' => 40],
            [['DCPG_CDG_ESTADO', 'DCPG_TIP_INGRESO', 'DCPG_TIP_IVA', 'DCPG_TPO_AJUSTE', 'DCPG_TPO_DOCUMENTO', 'DCPG_TPO_CREDITO_TRIB', 'DCPG_INTERFASE_LOTUS', 'DCPG_DOC_ELECTRONICO'], 'string', 'max' => 1],
            [['DCPG_GLS_AUX'], 'string', 'max' => 500],
            [['DCPG_PTO_EMISION'], 'string', 'max' => 3],
            [['DCPG_SRI_AUTORIZACION'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SEQ_DCPG_CDG' => 'Seq  Dcpg  Cdg',
            'EMPR_CDG' => 'Empr  Cdg',
            'DCPG_CRR_INTERNO' => 'Dcpg  Crr  Interno',
            'CLPP_CDG' => 'Clpp  Cdg',
            'TPDC_CDG' => 'Tpdc  Cdg',
            'LBRS_CDG' => 'Lbrs  Cdg',
            'DCPG_FCH_INGRESO' => 'Dcpg  Fch  Ingreso',
            'DCPG_FCH_RECEPCION' => 'Dcpg  Fch  Recepcion',
            'DCPG_FOL_DOCTO' => 'Dcpg  Fol  Docto',
            'PRSH_CDG_PERS' => 'Prsh  Cdg  Pers',
            'PRSH_DV_PERS' => 'Prsh  Dv  Pers',
            'DCPG_NMR_CONTRATO' => 'Dcpg  Nmr  Contrato',
            'TTPG_CDG' => 'Ttpg  Cdg',
            'DCPG_FCH_EMISION' => 'Dcpg  Fch  Emision',
            'DCPG_FCH_PAGO' => 'Dcpg  Fch  Pago',
            'DCPG_MTV_EMISION' => 'Dcpg  Mtv  Emision',
            'TPMN_CDG' => 'Tpmn  Cdg',
            'DCPG_TIP_CAMBIO' => 'Dcpg  Tip  Cambio',
            'DCPG_VLR_ORIGINAL' => 'Dcpg  Vlr  Original',
            'DCPG_VLR_PESOS' => 'Dcpg  Vlr  Pesos',
            'DCPG_VLR_AFECTO' => 'Dcpg  Vlr  Afecto',
            'DCPG_VLR_EXENTO' => 'Dcpg  Vlr  Exento',
            'DCPG_TIP_CTL_IVA' => 'Dcpg  Tip  Ctl  Iva',
            'DCPG_VLR_IVA' => 'Dcpg  Vlr  Iva',
            'TPIM_CDG_1' => 'Tpim  Cdg 1',
            'DCPG_VLR_IMPUESTO_1' => 'Dcpg  Vlr  Impuesto 1',
            'TPIM_CDG_2' => 'Tpim  Cdg 2',
            'DCPG_VLR_IMPUESTO_2' => 'Dcpg  Vlr  Impuesto 2',
            'TPRT_CDG' => 'Tprt  Cdg',
            'DCPG_VLR_RETENCION' => 'Dcpg  Vlr  Retencion',
            'DCPG_TTL_PAGO' => 'Dcpg  Ttl  Pago',
            'EADC_CDG' => 'Eadc  Cdg',
            'DCPG_FCH_AUTORIZACION' => 'Dcpg  Fch  Autorizacion',
            'DCPG_MTV_RECHAZO' => 'Dcpg  Mtv  Rechazo',
            'ESCN_CDG' => 'Escn  Cdg',
            'DCPG_FCH_ULT_PAGO' => 'Dcpg  Fch  Ult  Pago',
            'DCPG_TTL_APLC_CPAGOS' => 'Dcpg  Ttl  Aplc  Cpagos',
            'DCPG_TTL_APLC_VENTAS' => 'Dcpg  Ttl  Aplc  Ventas',
            'DCPG_TTL_NOTA_CREDITO' => 'Dcpg  Ttl  Nota  Credito',
            'DCPG_VLR_PAGADOS_PESOS' => 'Dcpg  Vlr  Pagados  Pesos',
            'DCPG_SLD_ACTUAL_PESOS' => 'Dcpg  Sld  Actual  Pesos',
            'DCPG_VLR_PAGADOS_ORIG' => 'Dcpg  Vlr  Pagados  Orig',
            'DCPG_SLD_ACTUAL_ORIG' => 'Dcpg  Sld  Actual  Orig',
            'DCPG_DIF_CAMBIO' => 'Dcpg  Dif  Cambio',
            'UNCP_CDG' => 'Uncp  Cdg',
            'OFTS_CDG' => 'Ofts  Cdg',
            'USRS_USERNAME' => 'Usrs  Username',
            'DCPG_CDG_ESTADO' => 'Dcpg  Cdg  Estado',
            'DCPG_CDG_INGRESO' => 'Dcpg  Cdg  Ingreso',
            'SEQ_TRCN_CDG' => 'Seq  Trcn  Cdg',
            'DCPG_TIP_INGRESO' => 'Dcpg  Tip  Ingreso',
            'DCPG_PERIODO_CTB' => 'Dcpg  Periodo  Ctb',
            'SEQ_DCPG_CDG_REF' => 'Seq  Dcpg  Cdg  Ref',
            'TPMN_CDG_PAGO' => 'Tpmn  Cdg  Pago',
            'DCPG_TIP_IVA' => 'Dcpg  Tip  Iva',
            'DCPG_VLR_IVA_AFIJO' => 'Dcpg  Vlr  Iva  Afijo',
            'CNBN_CDG' => 'Cnbn  Cdg',
            'DCPG_GLS_AUX' => 'Dcpg  Gls  Aux',
            'SEQ_PRIF_CDG' => 'Seq  Prif  Cdg',
            'DCPG_TPO_AJUSTE' => 'Dcpg  Tpo  Ajuste',
            'DCPG_TPO_DOCUMENTO' => 'Dcpg  Tpo  Documento',
            'DCPG_TPO_CREDITO_TRIB' => 'Dcpg  Tpo  Credito  Trib',
            'DCPG_IVA_CDG' => 'Dcpg  Iva  Cdg',
            'SEQ_DCPG_CDG_DONC' => 'Seq  Dcpg  Cdg  Donc',
            'SEQ_DCPG_CDG_REF2' => 'Seq  Dcpg  Cdg  Ref2',
            'DCPG_VLR_O_RETENCION' => 'Dcpg  Vlr  O  Retencion',
            'DCPG_MNT_BASE_ICE' => 'Dcpg  Mnt  Base  Ice',
            'DCPG_CDG_ICE' => 'Dcpg  Cdg  Ice',
            'DCPG_BASE_IMP_RENTA' => 'Dcpg  Base  Imp  Renta',
            'DCPG_VLR_ICE' => 'Dcpg  Vlr  Ice',
            'DCVP_NMR_CONTRATO' => 'Dcvp  Nmr  Contrato',
            'SEQ_CTPS_CDG' => 'Seq  Ctps  Cdg',
            'CTPS_FOLIO' => 'Ctps  Folio',
            'CNFC_CDG' => 'Cnfc  Cdg',
            'DCPG_INTERFASE_LOTUS' => 'Dcpg  Interfase  Lotus',
            'DCPG_BASE_EXENT_RENTA' => 'Dcpg  Base  Exent  Renta',
            'ESIN_CDG' => 'Esin  Cdg',
            'DCPG_NO_OBJETO_IVA' => 'Dcpg  No  Objeto  Iva',
            'DCPG_COD_ESTABLEC' => 'Dcpg  Cod  Establec',
            'DCPG_PTO_EMISION' => 'Dcpg  Pto  Emision',
            'DCPG_SRI_AUTORIZACION' => 'Dcpg  Sri  Autorizacion',
            'DCPG_DOC_ELECTRONICO' => 'Dcpg  Doc  Electronico',
        ];
    }
}
