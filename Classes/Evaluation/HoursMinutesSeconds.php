<?php
namespace Brightside\Vimeovideo\Evaluation;

use TYPO3\CMS\Core\Page\JavaScriptModuleInstruction;
/**
 * Class for field value validation/evaluation to be used in 'eval' of TCA
 */
class HoursMinutesSeconds
{

   /**
    * JavaScript code for client side validation/evaluation
    */
    public function returnFieldJS(): JavaScriptModuleInstruction
    {
        return JavaScriptModuleInstruction::create(
            '@t3brightside/vimeovideo/form-engine-evaluation.js',
            'FormEngineEvaluation'
        );
    }
}
