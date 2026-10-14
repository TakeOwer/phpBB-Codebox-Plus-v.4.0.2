<?php
/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/*************************************************************************************
 * hlsl.php
 * -----
 * Author: Nick Darnell (NickDarnell@gmail.com)
 * Copyright: (c) 2010 Nick Darnell (NickDarnell@gmail.com)
 * Release Version: 1.0
 * Date Started: 6/30/2010
 *
 * HLSL language file for GeSHi.
 *
 * CHANGES
 * -------
 *
 *************************************************************************************
 *
 *     This file is part of GeSHi.
 *
 *   GeSHi is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   GeSHi is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with GeSHi; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ************************************************************************************/

$language_data = array (
    'LANG_NAME' => 'HLSL',
    'COMMENT_SINGLE' => array(1 => '//', 2 => '#'),
    'COMMENT_MULTI' => array('/*' => '*/'),
    'COMMENT_REGEXP' => array(
        //Multiline-continued single-line comments
        1 => '/\/\/(?:\\\\\\\\|\\\\\\n|.)*$/m',
        //Multiline-continued preprocessor define
        2 => '/#(?:\\\\\\\\|\\\\\\n|.)*$/m'
        ),
    'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
    'QUOTEMARKS' => array("'", '"'),
    'ESCAPE_CHAR' => '',
    'ESCAPE_REGEXP' => array(
        //Simple Single Char Escapes
        1 => "#\\\\[abfnrtv\\'\"?\n]#i",
        //Hexadecimal Char Specs
        2 => "#\\\\x[\da-fA-F]{2}#",
        //Hexadecimal Char Specs
        3 => "#\\\\u[\da-fA-F]{4}#",
        //Hexadecimal Char Specs
        4 => "#\\\\U[\da-fA-F]{8}#",
        //Octal Char Specs
        5 => "#\\\\[0-7]{1,3}#"
        ),
    'NUMBERS' =>
        GESHI_NUMBER_INT_BASIC | GESHI_NUMBER_INT_CSTYLE | GESHI_NUMBER_BIN_PREFIX_0B |
        GESHI_NUMBER_OCT_PREFIX | GESHI_NUMBER_HEX_PREFIX | GESHI_NUMBER_FLT_NONSCI |
        GESHI_NUMBER_FLT_NONSCI_F | GESHI_NUMBER_FLT_SCI_SHORT | GESHI_NUMBER_FLT_SCI_ZERO,
    'KEYWORDS' => array(
        1 => array(
            'BlendState', 'Bool', 'Bool1', 'Bool2', 'Bool3', 'Bool4', 'Break', 'Buffer',
            'CBuffer', 'Class', 'Compile', 'Const', 'Continue',
            'DepthStencilState', 'DepthStencilView', 'Discard', 'Do', 'Double', 'Double1', 'Double2', 'Double3', 'Double4',
            'CBuffer', 'Class', 'Compile', 'Const', 'Continue',
            'Else', 'Extern',
            'False', 'Float', 'Float1', 'Float2', 'Float2x2', 'Float2x3', 'Float2x4', 'Float3', 'Float3x2', 'Float3x3', 'Float3x4', 'Float4', 'Float4x2', 'Float4x3', 'Float4x4', 'For',
            'GeometryShader',
            'Half', 'Half1', 'Half2', 'Half2x2', 'Half2x3', 'Half2x4', 'Half3', 'Half3x2', 'Half3x3', 'Half3x4', 'Half4', 'Half4x2', 'Half4x3', 'Half4x4',
            'If', 'In', 'Inline',
            'Inout', 'Int', 'Int1', 'Int2', 'Int3', 'Int4', 'Interface',
            'Matrix',
            'Namespace', 'Nointerpolation', 'numthreads',
            'Out',
            'Pass', 'PixelShader', 'Precise',
            'RasterizerState', 'RenderTargetView', 'Return', 'Register', 'RWStructuredBuffer',
            'Sampler', 'Sampler1D', 'Sampler2D', 'Sampler3D', 'SamplerCUBE', 'Sampler_State', 'SamplerState', 'SamplerComparisonState', 'Shared', 'Stateblock', 'Stateblock_state', 'Static', 'String', 'Struct', 'StructuredBuffer', 'Switch',
            'TBuffer', 'Technique', 'Technique10', 'texture1', 'Texture1D', 'Texture1DArray', 'Texture2D', 'Texture2DArray', 'Texture2DMS', 'Texture2DMSArray', 'Texture3D', 'TextureCube', 'TextureCubeArray', 'True', 'Typedef',
            'Uniform', 'UInt', 'UInt1', 'UInt2', 'UInt3', 'UInt4',
            'Vector', 'VertexShader', 'Void', 'Volatile', 'While'
            ),
        2 => array(
            'abs', 'acos', 'all', 'AllMemoryBarrier', 'AllMemoryBarrierWithGroupSync', 'any', 'asdouble', 'asfloat', 'asin', 'asint', 'asuint', 'atan', 'atan2',
            'ceil', 'clamp', 'clip', 'cos', 'cosh', 'countbits', 'cross',
            'D3DCOLORtoUBYTE4', 'ddx', 'ddx_coarse', 'ddx_fine', 'ddy', 'ddy_coarse', 'ddy_fine', 'degrees', 'determinant', 'DeviceMemoryBarrier', 'DeviceMemoryBarrierWithGroupSync', 'distance', 'dot', 'dst',
            'EvaluateAttributeAtCentroid', 'EvaluateAttributeAtSample', 'EvaluateAttributeSnapped', 'exp', 'exp2',
            'f16tof32', 'f32tof16', 'faceforward', 'firstbithigh', 'firstbitlow', 'floor', 'fmod', 'frac', 'frexp', 'fwidth',
            'GetRenderTargetSampleCount', 'GetRenderTargetSamplePosition', 'GroupMemoryBarrier', 'GroupMemoryBarrierWithGroupSync',
            'InterlockedAdd', 'InterlockedAnd', 'InterlockedCompareExchange', 'InterlockedCompareStore', 'InterlockedExchange', 'InterlockedMax', 'InterlockedMin', 'InterlockedOr', 'InterlockedXor', 'isfinite', 'isinf', 'isnan',
            'ldexp', 'length', 'lerp', 'lit', 'log', 'log10', 'log2', 'Load',
            'mad', 'max', 'min', 'modf', 'mul',
            'noise', 'normalize', 
            'pow', 'Process2DQuadTessFactorsAvg', 'Process2DQuadTessFactorsMax', 'Process2DQuadTessFactorsMin', 'ProcessIsolineTessFactors', 'ProcessQuadTessFactorsAvg', 'ProcessQuadTessFactorsMax', 'ProcessQuadTessFactorsMin', 'ProcessTriTessFactorsAvg', 'ProcessTriTessFactorsMax', 'ProcessTriTessFactorsMin',
            'radians', 'rcp', 'reflect', 'refract', 'reversebits', 'round', 'rsqrt',
            'saturate', 'sign', 'sin', 'sincos', 'sinh', 'smoothstep', 'sqrt', 'step', 'SampleLevel',
            'tan', 'tanh', 'tex1D', 'tex1Dbias', 'tex1Dgrad', 'tex1Dlod', 'tex1Dproj', 'tex2D', 'tex2Dbias', 'tex2Dgrad', 'tex2Dlod', 'tex2Dproj', 'tex3D', 
            'tex3Dbias', 'tex3Dgrad', 'tex3Dlod', 'tex3Dproj', 'texCUBE', 'texCUBEbias', 'texCUBEgrad', 'texCUBElod', 'texCUBEproj', 'transpose', 'trunc'
            ),
        3 => array(
            'BINORMAL',
            'BLENDINDICES',
            'BLENDWEIGHT',
            'COLOR',
            'NORMAL',
            'POSITION',
            'POSITIONT',
            'PSIZE',
            'TANGENT',
            'TEXCOORD',
            'FOG',
            'TESSFACTOR',
            'VFACE',
            'VPOS',
            'DEPTH',
            'SV_ClipDistance',
            'SV_CullDistance',
            'SV_Coverage',
            'SV_Depth',
            'SV_DispatchThreadID',
            'SV_DomainLocation',
            'SV_GroupID',
            'SV_GroupIndex',
            'SV_GroupThreadID',
            'SV_GSInstanceID',
            'SV_InsideTessFactor',
            'SV_IsFrontFace',
            'SV_OutputControlPointID',
            'SV_Position',
            'SV_RenderTargetArrayIndex',
            'SV_SampleIndex',
            'SV_Target',
            'SV_TessFactor',
            'SV_VertexID'
            ),
        ),
    'SYMBOLS' => array(
        '(', ')', '{', '}', '[', ']',
        '+', '-', '*', '/', '%',
        '=', '<', '>',
        '!', '^', '&', '|',
        '?', ':',
        ';', ','
        ),
    'CASE_SENSITIVE' => array(
        GESHI_COMMENTS => false,
        1 => false,
        2 => false,
        3 => false,
        ),
    'STYLES' => array(
        'KEYWORDS' => array(
            1 => 'color: #C79623;',
            2 => 'color: #8DA6CE;',
            3 => 'color: #607392;'
            ),
        'COMMENTS' => array(
            1 => 'color: #5f5a60; font-style: italic;',
            2 => 'color: #5f5a60; font-style: italic;',
            'MULTI' => 'color: #5f5a60; font-style: italic;',
            ),
        'ESCAPE_CHAR' => array(
            0 => 'color: #d6bb6d; font-weight: bold;',
            1 => 'color: #d6bb6d; font-weight: bold;',
            2 => 'color: #ad9361; font-weight: bold;',
            3 => 'color: #ad9361; font-weight: bold;',
            4 => 'color: #ad9361; font-weight: bold;',
            5 => 'color: #997643; font-weight: bold;',
            'HARD' => '',
            ),
        'BRACKETS' => array(
            0 => 'color: #daefa3;'
            ),
        'STRINGS' => array(
            0 => 'color: #8f9d6a;'
            ),
        'NUMBERS' => array(
            0 => 'color: #cf8160;',
            GESHI_NUMBER_BIN_PREFIX_0B => 'color: #cf8160;',
            GESHI_NUMBER_OCT_PREFIX => 'color: #cf8160;',
            GESHI_NUMBER_HEX_PREFIX => 'color: #cf8160;',
            GESHI_NUMBER_FLT_SCI_SHORT => 'color:#cf8160;',
            GESHI_NUMBER_FLT_SCI_ZERO => 'color:#cf8160;',
            GESHI_NUMBER_FLT_NONSCI_F => 'color:#cf8160;',
            GESHI_NUMBER_FLT_NONSCI => 'color:#cf8160;'
            ),
        'METHODS' => array(
            1 => 'color: #9b859d;',
            2 => 'color: #9b859d;'
            ),
        'SYMBOLS' => array(
            0 => 'color: #afc4db;'
            ),
        'REGEXPS' => array(
            ),
        'SCRIPT' => array(
            )
        ),
    'URLS' => array(
        1 => '',
        2 => '',
        3 => '',
        4 => ''
        ),
    'OOLANG' => true,
    'OBJECT_SPLITTERS' => array(
        1 => '.',
        2 => '::'
        ),
    'REGEXPS' => array(
        ),
    'STRICT_MODE_APPLIES' => GESHI_NEVER,
    'SCRIPT_DELIMITERS' => array(
        ),
    'HIGHLIGHT_STRICT_BLOCK' => array(
        ),
    'TAB_WIDTH' => 4,
    'PARSER_CONTROL' => array(
        'KEYWORDS' => array(
            'DISALLOWED_BEFORE' => "(?<![a-zA-Z0-9\$_\|\#>|^])",
            'DISALLOWED_AFTER' => "(?![a-zA-Z0-9_<\|%\\-])"
        )
    )
);

?>
