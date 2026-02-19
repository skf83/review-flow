<?php

namespace app\views\extensions;

use Illuminate\Translation\Translator;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TranslationExtension extends AbstractExtension {

    protected Translator $translator;

    /**
     * TranslationExtension constructor.
     * @param Translator $translator
     */
    public function __construct(Translator $translator) {

        $this->translator = $translator;
    }

    /**
     * @return array|\Twig\TwigFunction[]
     */
    public function getFunctions() {

        return [
            new TwigFunction('trans', [$this, 'trans']),
            new TwigFunction('trans_choice', [$this, 'transChoice']),
            new TwigFunction('locale', [$this, 'locale'])
        ];
    }

    /**
     * @param $key
     * @param array $replace
     * @return array|null|string
     */
    public function trans($key, array $replace = []) {

        return $this->translator->get($key, $replace);
    }

    /**
     * @param $key
     * @param $count
     * @param array $replace
     * @return string
     */
    public function transChoice($key, $count, array $replace = []) {

        return $this->translator->choice($key, $count, $replace);
    }

    /**
     * @return string
     */
    public function locale() {

        return $this->translator->getLocale();
    }
}
