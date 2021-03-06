<?php
namespace Luffy\Thrift2Hbase;

/**
 * Autogenerated by Thrift Compiler (0.12.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

/**
 * Used to perform Put operations for a single row.
 * 
 * Add column values to this object and they'll be added.
 * You can provide a default timestamp if the column values
 * don't have one. If you don't provide a default timestamp
 * the current time is inserted.
 * 
 * You can specify how this Put should be written to the write-ahead Log (WAL)
 * by changing the durability. If you don't provide durability, it defaults to
 * column family's default setting for durability.
 */
class TPut
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'row',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'columnValues',
            'isRequired' => true,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\Luffy\Thrift2Hbase\TColumnValue',
                ),
        ),
        3 => array(
            'var' => 'timestamp',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        5 => array(
            'var' => 'attributes',
            'isRequired' => false,
            'type' => TType::MAP,
            'ktype' => TType::STRING,
            'vtype' => TType::STRING,
            'key' => array(
                'type' => TType::STRING,
            ),
            'val' => array(
                'type' => TType::STRING,
                ),
        ),
        6 => array(
            'var' => 'durability',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        7 => array(
            'var' => 'cellVisibility',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Luffy\Thrift2Hbase\TCellVisibility',
        ),
    );

    /**
     * @var string
     */
    public $row = null;
    /**
     * @var \Luffy\Thrift2Hbase\TColumnValue[]
     */
    public $columnValues = null;
    /**
     * @var int
     */
    public $timestamp = null;
    /**
     * @var array
     */
    public $attributes = null;
    /**
     * @var int
     */
    public $durability = null;
    /**
     * @var \Luffy\Thrift2Hbase\TCellVisibility
     */
    public $cellVisibility = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['row'])) {
                $this->row = $vals['row'];
            }
            if (isset($vals['columnValues'])) {
                $this->columnValues = $vals['columnValues'];
            }
            if (isset($vals['timestamp'])) {
                $this->timestamp = $vals['timestamp'];
            }
            if (isset($vals['attributes'])) {
                $this->attributes = $vals['attributes'];
            }
            if (isset($vals['durability'])) {
                $this->durability = $vals['durability'];
            }
            if (isset($vals['cellVisibility'])) {
                $this->cellVisibility = $vals['cellVisibility'];
            }
        }
    }

    public function getName()
    {
        return 'TPut';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->row);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->columnValues = array();
                        $_size30 = 0;
                        $_etype33 = 0;
                        $xfer += $input->readListBegin($_etype33, $_size30);
                        for ($_i34 = 0; $_i34 < $_size30; ++$_i34) {
                            $elem35 = null;
                            $elem35 = new \Luffy\Thrift2Hbase\TColumnValue();
                            $xfer += $elem35->read($input);
                            $this->columnValues []= $elem35;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->timestamp);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::MAP) {
                        $this->attributes = array();
                        $_size36 = 0;
                        $_ktype37 = 0;
                        $_vtype38 = 0;
                        $xfer += $input->readMapBegin($_ktype37, $_vtype38, $_size36);
                        for ($_i40 = 0; $_i40 < $_size36; ++$_i40) {
                            $key41 = '';
                            $val42 = '';
                            $xfer += $input->readString($key41);
                            $xfer += $input->readString($val42);
                            $this->attributes[$key41] = $val42;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->durability);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::STRUCT) {
                        $this->cellVisibility = new \Luffy\Thrift2Hbase\TCellVisibility();
                        $xfer += $this->cellVisibility->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('TPut');
        if ($this->row !== null) {
            $xfer += $output->writeFieldBegin('row', TType::STRING, 1);
            $xfer += $output->writeString($this->row);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->columnValues !== null) {
            if (!is_array($this->columnValues)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('columnValues', TType::LST, 2);
            $output->writeListBegin(TType::STRUCT, count($this->columnValues));
            foreach ($this->columnValues as $iter43) {
                $xfer += $iter43->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->timestamp !== null) {
            $xfer += $output->writeFieldBegin('timestamp', TType::I64, 3);
            $xfer += $output->writeI64($this->timestamp);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->attributes !== null) {
            if (!is_array($this->attributes)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('attributes', TType::MAP, 5);
            $output->writeMapBegin(TType::STRING, TType::STRING, count($this->attributes));
            foreach ($this->attributes as $kiter44 => $viter45) {
                $xfer += $output->writeString($kiter44);
                $xfer += $output->writeString($viter45);
            }
            $output->writeMapEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->durability !== null) {
            $xfer += $output->writeFieldBegin('durability', TType::I32, 6);
            $xfer += $output->writeI32($this->durability);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cellVisibility !== null) {
            if (!is_object($this->cellVisibility)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('cellVisibility', TType::STRUCT, 7);
            $xfer += $this->cellVisibility->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
