<?php
namespace Math\Probability\Distribution\Continuous;

/**
 * Logistic distribution
 * https://en.wikipedia.org/wiki/Logistic_distribution
 */
class Logistic extends Continuous
{
    /**
     * Distribution parameter bounds limits
     * x ∈ (-∞,∞)
     * μ ∈ (-∞,∞)
     * s ∈ (0,∞)
     * @var array
     */
    const LIMITS = [
        'x' => '(-∞,∞)',
        'μ' => '(-∞,∞)',
        's' => '(0,∞)',
    ];

    /**
     * Probability density function
     *
     *                     /  x - μ \
     *                 exp| - -----  |
     *                     \    s   /
     * f(x; μ, s) = -----------------------
     *                /        /  x - μ \ \ ²
     *              s| 1 + exp| - -----  | |
     *                \        \    s   / /
     *
     * @param number $x
     * @param number $μ location parameter
     * @param number $s scale parameter > 0
     *
     * @return float
     */
    public static function PDF($x, $μ, $s)
    {
        self::checkLimits(self::LIMITS, ['x' => $x, 'μ' => $μ, 's' => $s]);

        $ℯ＾⁻⁽x⁻μ⁾／s = exp(-($x - $μ) / $s);
        return $ℯ＾⁻⁽x⁻μ⁾／s / ($s * pow(1 + $ℯ＾⁻⁽x⁻μ⁾／s, 2));
    }
    /**
     * Cumulative distribution function
     * From -∞ to x (lower CDF)
     *
     *                      1
     * f(x; μ, s) = -------------------
     *                      /  x - μ \
     *              1 + exp| - -----  |
     *                      \    s   /
     *
     * @param number $μ location parameter
     * @param number $s scale parameter
     * @param number $x
     *
     * @return float
     */
    public static function CDF($x, $μ, $s)
    {
        self::checkLimits(self::LIMITS, ['x' => $x, 'μ' => $μ, 's' => $s]);

        $ℯ＾⁻⁽x⁻μ⁾／s = exp(-($x - $μ) / $s);
        return 1 / (1 + $ℯ＾⁻⁽x⁻μ⁾／s);
    }
    
    /**
     * Mean of the distribution
     *
     * μ = μ
     *
     * @param number $μ location parameter
     * @param number $s scale parameter
     *
     * @return μ
     */
    public static function mean($μ, $s)
    {
        self::checkLimits(self::LIMITS, ['μ' => $μ, 's' => $s]);

        return $μ;
    }
}
